const ratio = .1
const option = {
  root: null,
  rootMargin: '0px',
  threshold: ratio
}

const handleIntersect = function (entries, observer){
  entries.forEach(function (entry){
    if (entry.intersectionRatio > ratio){
      entry.target.classList.add('reveal-visible')
      observer.unobserve(entry.target)
    }
  })
}

const observer = new IntersectionObserver(handleIntersect, option)
document.querySelectorAll('.reveal').forEach(function (r){
  observer.observe(r)
})


const handleIntersect1 = function (entries1, observer1){
  entries1.forEach(function (entry1){
    if (entry1.intersectionRatio > ratio){
      entry1.target.classList.add('reveal-visible1')
      observer1.unobserve(entry1.target)
    }
  })
}

const observer1 = new IntersectionObserver(handleIntersect1, option)
document.querySelectorAll('.reveal1').forEach(function (r){
  observer1.observe(r)
})
