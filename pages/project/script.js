const aPolygons = document.querySelectorAll('article > section#gp polygon')
const aCircles = document.querySelectorAll('article > section#gp circle')
const aRects = document.querySelectorAll('article > section#gp rect')
const aA = document.querySelectorAll('article > section#gp > div:first-of-type a')

//< Правка свойств областей svg
const formatAreasAttributes = (aFigures) => {
 Array.from(aFigures).forEach((figure) => {
  Array.from(figure.attributes).forEach((attribute) => {
   figure.setAttribute(`data-${attribute.name}`, attribute.value)
   figure.removeAttribute(attribute.name)
  })
 })
}
formatAreasAttributes(aPolygons)
formatAreasAttributes(aCircles)
formatAreasAttributes(aRects)
//> Правка свойств областей svg

//< Подгонка точек под ширину экрана
const recalculationOfCoordinates = () => {
 if(!document.querySelector('article > section#gp')){ return false }

 const initialWidth = document.querySelector('article > section#gp img[alt="GP"]').dataset.initialwidth
 const initialHeight = document.querySelector('article > section#gp img[alt="GP"]').dataset.initialheight
 const schemeWidth = document.querySelector('article > section#gp > div:last-of-type > div').offsetWidth
 const schemeHeight = document.querySelector('article > section#gp > div:last-of-type > div').offsetHeight
 const ratioWidth = initialWidth / schemeWidth
 const ratioHeight = initialHeight / schemeHeight

 document.querySelector('article > section#gp > div:last-of-type > div > div').innerHTML = '';

 Array.from(aPolygons).forEach((polygon) => {
  let points = polygon.dataset.points.replaceAll(',', ' ').trim()
  let a_points = points.split(' ')
  let aPoints = []
  let cx = 999999999
  let cy = 999999999
  a_points.forEach((v, k) => {
   if(k % 2 != 1){
    v = v / ratioWidth
    //v = v.toFixed(2)
    aPoints.push(v)
    if(cx > v){ cx = v }
   } else{
    v = v / ratioHeight
    //v = v.toFixed(2)
    aPoints.push(v)
    if(cy > v){ cy = v }
   }
  })
  polygon.setAttribute('points', aPoints.join(' '))

  let img = document.createElement('img')
  img.src = polygon.dataset.picture
  document.querySelector('article > section#gp > div:last-of-type > div > div').prepend(img)
  img.onload = () => {
   img.dataset.id = polygon.dataset.id
   img.style.width = img.offsetWidth / ratioWidth + 'px'
   //img.style.height = img.offsetHeight / ratioHeight + 'px'
   img.style.top = cy + 'px'
   img.style.left = cx + 'px'
  }
 })
 //
 Array.from(aCircles).forEach((circle) => {
  circle.setAttribute('cx',circle.dataset.cx / ratioWidth)
  circle.setAttribute('cy',circle.dataset.cy / ratioHeight)
  circle.setAttribute('r',circle.dataset.r / ratioHeight)

  let img = document.createElement('img')
  img.src = circle.dataset.picture
  document.querySelector('article > section#gp > div:last-of-type > div > div').prepend(img)
  img.onload = () => {
   const newWidth = img.offsetWidth / ratioWidth
   const actualWidth = newWidth / 100 * 64.4
   const actualHeight = (img.offsetHeight / ratioHeight) / 100 * 64.4

   img.dataset.id = circle.dataset.id
   img.style.width = newWidth + 'px'
   //img.style.height = img.offsetHeight / ratioHeight + 'px'
   img.style.top = circle.getAttribute('cy') - ((img.offsetHeight / ratioHeight) / 100 * 4.74) - (actualHeight / 2) + 'px'
   img.style.left = circle.getAttribute('cx') - (newWidth / 100 * 4.74) - (actualWidth / 2) + 'px'
  }
 })
 //
 Array.from(aRects).forEach((rect) => {
  rect.setAttribute('x',rect.dataset.x / ratioWidth)
  rect.setAttribute('y',rect.dataset.y / ratioHeight)
  rect.setAttribute('width',rect.dataset.width / ratioWidth)
  rect.setAttribute('height',rect.dataset.height / ratioHeight)

  let img = document.createElement('img')
  img.src = rect.dataset.picture
  document.querySelector('article > section#gp > div:last-of-type > div > div').prepend(img)
  img.onload = function(){
   img.dataset.id = rect.dataset.id
   img.style.width = (this.offsetWidth / ratioWidth) + 'px'
   //img.style.height = (this.offsetHeight / ratioHeight) + 'px'
   img.style.top = rect.getAttribute('y') + 'px'
   img.style.left = rect.getAttribute('x') + 'px'
  }
 })
}
document.addEventListener('DOMContentLoaded',() => {
 window.onload = recalculationOfCoordinates
 window.onresize = recalculationOfCoordinates
})
//> Подгонка точек под ширину экрана

//< Отображение gp_pictures при наведении на области
const addEventsHandlers = (aFigures) => {
 Array.from(aFigures).forEach((figure) => {
  figure.addEventListener('click', (e) => {
   document.querySelector('Article > Section#gp > Div:first-of-type A[data-id="' + e.target.dataset.id + '"]').click()
  })
  figure.addEventListener('mouseenter', (e) => {
   document.querySelector('section#gp img[alt="GP"]').style.opacity = '0.2'

   const id = e.target.dataset.id
   const aPicturesOfCurrentPlant = document.querySelectorAll(`article > section#gp > div:last-of-type > div > div img[data-id="${id}"]`)
   Array.from(aPicturesOfCurrentPlant).forEach((pictureOfCurrentPlant) => {
    pictureOfCurrentPlant.classList.add('hover')
   })

   document.querySelector('article > section#gp > div:first-of-type').classList.add('active')
   Array.from(aA).forEach((v) => {
    if(v.dataset.id == id){
     v.style.opacity = '1'
     v.parentElement.previousElementSibling.style.opacity = '1'
    }
   })

   //< Подсказка
   if(
    e.target.getAttribute('cy') ||
    e.target.getAttribute('y') ||
    e.target.getAttribute('points')
   ){
    const target = e.target.parentElement.getBoundingClientRect()
    const x = e.clientX - target.left
    const y = e.clientY - target.top

    const hint = document.createElement('div')
    hint.classList.add('hint')
    hint.innerText = document.querySelector(`article > section#gp > div:first-of-type a[data-id='${e.target.dataset.id}']`).textContent
    hint.style.top = y + 'px'
    hint.style.left = x + 'px'
    document.querySelector('article > section#gp > div:last-of-type > div > div').prepend(hint)
   }
   //> Подсказка
  })
  figure.addEventListener('mouseout',(e) => {
   document.querySelector('section#gp img[alt="GP"]').removeAttribute('style')

   const id = e.target.dataset.id
   const aPicturesOfCurrentPlant = document.querySelectorAll(`article > section#gp > div:last-of-type > div > div img[data-id="${id}"]`)
   Array.from(aPicturesOfCurrentPlant).forEach((pictureOfCurrentPlant) => {
    pictureOfCurrentPlant.removeAttribute('class')
   })

   document.querySelector('Article > Section#gp > Div:first-of-type').removeAttribute('class')
   Array.from(aA).forEach((v) => {
    v.removeAttribute('style')
    v.parentElement.previousElementSibling.removeAttribute('style')
   })

   //< Подсказки
   const aHints = document.querySelectorAll('Article > Section#gp > Div:last-of-type Div.hint')
   Array.from(aHints).forEach((hint) => hint.remove())
   //> Подсказки
  })
 })
}
addEventsHandlers(aPolygons)
addEventsHandlers(aCircles)
addEventsHandlers(aRects)
addEventsHandlers(aA)
//>  Отображение gp_pictures при наведении на области