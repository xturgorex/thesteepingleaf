jQuery(function ($) {
  
  $('#variety-selector').sly({
    horizontal: true,
    itemNav: 'basic',
    scrollBy: 1,
    mouseDragging: 1,
    releaseSwing: true,
    swingSpeed: 0.1,
    elasticBounds: true,
    moveBy:     900,
    speed: 200,
    startAt: 0,
    forward: '#right-variety',
    backward: '#left-variety',
    disabledClass: 'disabled-nav',
    touchDragging: true 
  });
  
  $('#mood-selector').sly({
    horizontal: true,
    itemNav: 'basic',
    scrollBy: 1,
    mouseDragging: 1,
    releaseSwing: true,
    swingSpeed: 0.1,
    elasticBounds: true,
    moveBy:     900,
    speed: 200,
    startAt: 0,
    forward: '#right-mood',
    backward: '#left-mood',
    disabledClass: 'disabled-nav',
    touchDragging: true 
  });

  
});