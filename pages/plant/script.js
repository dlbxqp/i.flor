const aPolygons = document.querySelectorAll('article > section#gp polygon')
const aCircles = document.querySelectorAll('article > section#gp circle')
const aRects = document.querySelectorAll('article > section#gp rect')

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
 const schemeWidth = document.querySelector('article > section#gp > div:last-of-type > div:last-of-type').offsetWidth
 const schemeHeight = document.querySelector('article > section#gp > div:last-of-type > div:last-of-type').offsetHeight
 const ratioWidth = initialWidth / schemeWidth
 const ratioHeight = initialHeight / schemeHeight

 document.querySelector('article > section#gp > div:last-of-type > div > div').innerHTML = '';

 Array.from(aPolygons).forEach((polygon) => {
  const a_points = polygon.dataset.points.split(' ')
  const aPoints = []
  let cx = 999999999
  let cy = 999999999
  a_points.forEach((v, k) => {
   if(k % 2 != 1){
    v = v / ratioWidth
    aPoints.push(v)
    if(cx > v){ cx = v }
   } else{
    v = v / ratioHeight
    aPoints.push(v)
    if(cy > v){ cy = v }
   }
  })
  aPoints.join(' ')
  polygon.setAttribute('points', aPoints)

  let img = document.createElement('img')
  img.src = polygon.dataset.picture
  document.querySelector('article > section#gp > div:last-of-type > div > div').prepend(img)
  img.onload = function(){
   img.dataset.id = polygon.dataset.id
   img.style.width = (this.offsetWidth / ratioWidth) + 'px'
   img.style.height = (this.offsetHeight / ratioHeight) + 'px'
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
  img.onload = function(){
   img.dataset.id = circle.dataset.id
   img.style.width = (this.offsetWidth / ratioWidth) / 1.36 + 'px' //кривой знаменатель - подгонка под топорно вырезаные дизайнером изображения
   img.style.height = (this.offsetHeight / ratioHeight) / 1.36 + 'px' // -/- и здесь
   img.style.top = circle.getAttribute('cy') - (this.offsetHeight / 2.56) + 'px' // -/- и здесь
   img.style.left = circle.getAttribute('cx') - (this.offsetWidth / 2.2) + 'px' // -/- и здесь
  }
 })
 //
 Array.from(aPolygons).forEach((circle) => {

 })
}
document.addEventListener('DOMContentLoaded',() => {
 window.onload = recalculationOfCoordinates
 window.onresize = recalculationOfCoordinates
})
//> Подгонка точек под ширину экрана