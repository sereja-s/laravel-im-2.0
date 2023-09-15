/* ----------------------------- Global variabel ---------------------------- */

const rotateActive = () => {
  let rotate = document.querySelectorAll(".rotate");
  rotate.forEach((item) => {
    item.classList.toggle("active");
  });
};

const swiper = new Swiper(".slider-box", {
  // Optional parameters
  loop: true,
  effect: "fade",
  autoHeight: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
});

// Carousel js

const carousel = new Swiper(".carousel-box", {
  // Optional parameters
  autoHeight: true,
  slidesPerView: "auto",
  spaceBetween: 80,
  centeredSlides: true,

  // If we need pagination
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    481: {
      slidesPerView: 2,
      slidesPerGroup: 1,
      centeredSlides: false,
    },
    // when window width is >= 640px
    576: {
      slidesPerView: 2,
      slidesPerGroup: 2,
      centeredSlides: false,
    },
    767: {
      slidesPerView: 3,
      slidesPerGroup: 3,
      centeredSlides: false,
    },
    992: {
      slidesPerView: 4,
      slidesPerGroup: 4,
      centeredSlides: false,
    },
  },
});

// Product-showcase Heading option js

let tabToggle = document.querySelector(".tab-toggle");
let content = document.querySelector(".value-content");
let contentLi = document.querySelectorAll(".value-content li");
let value = document.querySelector(".value");

if (tabToggle && content && contentLi.length > 0 && value) {
  tabToggle.addEventListener("click", (e) => {
    content.classList.toggle("active");
    rotateActive();

    contentLi.forEach((item) => {
      item.addEventListener("click", () => {
        let activeLi = document.querySelector(".value-content .active");
        activeLi.classList.remove("active");
        value.innerHTML = item.innerHTML;
        item.classList.add("active");
      });
    });
  });
}
// Product-showcase tab js

let tabItem = document.querySelectorAll(".tab-item");
let tabTrigger = document.querySelectorAll(".tab-trigger");

tabTrigger.forEach((tab) => {
  tab.addEventListener("click", () => {
    tab.classList.remove("active");
    let tabId = tab.dataset.tab;
    activeTab(tabId);
  });
});

const activeTab = (tabId) => {
  tabItem.forEach((content) => {
    if (content.dataset.tab === tabId) {
      content.classList.add("active");
    } else {
      content.classList.remove("active");
    }
  });
};

// small-device sub menu js

let navtoggler = document.querySelectorAll(".nav-toggler");
let navRotate = document.querySelectorAll(".nav-toggler .rotate");

for (let i = 0; i < navtoggler.length; i++) {
  navtoggler[i].addEventListener("click", (e) => {
    e.preventDefault();
    e.target.closest(".nav-toggler").classList.toggle("active");
    navRotate[i].classList.toggle("active");
  });

  navtoggler[i].addEventListener("click", (e) => {
    e.preventDefault();
    for (let j = 0; j < navtoggler.length; j++) {
      if (navtoggler[j] !== e.target.closest(".nav-toggler")) {
        navtoggler[j].classList.remove("active");
      }
    }
  });
}

// small-device navbar show hide js
let menutoggler = document.querySelector(".menu-toggle");
let mobileNav = document.querySelector(".mobile-nav");
let overlay = document.querySelector(".overlay");

menutoggler.addEventListener("click", () => {
  mobileNav.classList.add("active");
  closeNav.classList.add("active");
  overlay.classList.add("active");
});

let closeNav = document.querySelector(".close");

closeNav.addEventListener("click", () => {
  mobileNav.classList.remove("active");
  overlay.classList.remove("active");
});

// Document to close all active class

document.addEventListener("click", (event) => {
  if (!event.target.closest(".menu-toggle") && !event.target.closest(".mobile-nav") && !event.target.closest(".data-trigger") && !event.target.closest(".data-popup .data-content") && !event.target.closest(".cart-trigger") && !event.target.closest(".cart-section") && !event.target.closest(".filter-trigger") && !event.target.closest(".filter-content") && !event.target.closest(".search-trigger") && !event.target.closest(".search-floating")) {
    mobileNav.classList.remove("active");
    if (cartContent) {
      cartContent.classList.remove("active");
    }
    overlay.classList.remove("active");
    for (let i = 0; i < dataPopup.length; i++) {
      dataPopup[i].classList.remove("active");
    }
    if (filterContent) {
      filterContent.classList.remove("active");
    }
    floatingSearch.classList.remove("active");
  }
});

// Single-Product js

const smallImage = new Swiper(".small-img", {
  freeMode: true,
  watchSlidesProgress: true,
  direction: "horizontal",
  slidesPerView: 4,
  spaceBetween: 20,

  breakpoints: {
    391: {
      spaceBetween: 50,
      slidesPerView: 5,
      direction: "horizontal",
    },
    577: {
      direction: "vertical",
      slidesPerView: 1,
      spaceBetween: 15,
    },
  },
});

const largeImage = new Swiper(".large-image", {
  // Optional parameters
  loop: true,
  autoHeight: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  thumbs: {
    swiper: smallImage,
  },
});

// Singel-Product Page Start here

// singel-product nav tav js

let tablink = document.querySelectorAll(".tab-navigation li a");
let tavLi = document.querySelectorAll(".tab-navigation li");
let activetabLi = document.querySelector(".tab-navigation .active");
let tabContent = document.querySelectorAll(".list-content");

tablink.forEach((item) => {
  item.addEventListener("click", () => {
    let tabId = item.dataset.tab;
    activeContent(tabId);

    tavLi.forEach((item) => {
      item.classList.remove("active");
    });
    let presentLi = item.closest("li");
    presentLi.classList.add("active");
  });
});

const activeContent = (tabId) => {
  tabContent.forEach((content) => {
    if (content.dataset.tab == tabId) {
      content.classList.add("active");
    } else {
      content.classList.remove("active");
    }
  });
};

// Single-Product Popup js

let trigger = document.querySelectorAll(".data-trigger");
let closeData = document.querySelectorAll(".data-popup .close");
let dataPopup = document.querySelectorAll(".data-popup");

for (let i = 0; i < trigger.length; i++) {
  trigger[i].addEventListener("click", () => {
    dataPopup[i].classList.add("active");
    overlay.classList.add("active");
  });

  closeData[i].addEventListener("click", () => {
    dataPopup[i].classList.remove("active");
    overlay.classList.remove("active");
  });
}

// Checkout  Cart show and hide js

let cartTrigger = document.querySelector(".cart-trigger");
let cartContent = document.querySelector(".cart-section");
let cartClose = document.querySelector(".cart-section .close-trigger");

if (cartTrigger) {
  cartTrigger.addEventListener("click", () => {
    overlay.classList.add("active");
    cartContent.classList.add("active");
  });

  cartClose.addEventListener("click", () => {
    cartContent.classList.remove("active");
    overlay.classList.remove("active");
  });
}

// Filter section js

let hasChild = document.querySelectorAll(".category-section .has-child");
let hasRotate = document.querySelectorAll(".has-child .rotate");

for (let i = 0; i < hasChild.length; i++) {
  hasChild[i].addEventListener("click", () => {
    hasChild[i].classList.toggle("active");
    hasRotate[i].classList.toggle("active");
  });

  hasChild[i].addEventListener("click", () => {
    for (let j = 0; j < hasChild.length; j++) {
      if (hasChild[j] !== hasChild[i]) {
        hasChild[j].classList.remove("active");
        hasRotate[j].classList.remove("active");
      }
    }
  });
  hasChild[i].addEventListener("click", (event) => {
    event.stopPropagation();
  });
}

// Prodcut filter js

let filterTrigger = document.querySelector(".filter-trigger");
let filterContent = document.querySelector(".filter-content");

if (filterContent) {
  filterTrigger.addEventListener("click", () => {
    filterContent.classList.add("active");
    overlay.classList.add("active");
  });
}

// Product Category sort js
let sortHeading = document.querySelector(".short-heading");
let sortValue = document.querySelector(".heading-value");
let sortItems = document.querySelectorAll(".short-item li");
let sortContent = document.querySelector(".short-item");

if (sortHeading) {
  sortHeading.addEventListener("click", () => {
    sortContent.classList.toggle("active");
    // rotateActive(); Sum bug here further fix it click to all rotate active same time

    sortItems.forEach((item) => {
      item.addEventListener("click", () => {
        sortValue.innerHTML = item.innerHTML;
        let activeLi = document.querySelector(".short-item li.active");
        activeLi.classList.remove("active");
        item.classList.add("active");
      });
    });
  });
}

// Floating Search js
let searchTrigger = document.querySelector(".search-trigger");
let floatingSearch = document.querySelector(".search-floating");
let searchClose = document.querySelector(".search-close");
console.log(searchTrigger);
console.log(floatingSearch);
console.log(searchClose);

searchTrigger.addEventListener("click", () => {
  floatingSearch.classList.add("active");
  overlay.classList.add("active");
});
searchClose.addEventListener("click", () => {
  floatingSearch.classList.remove("active");
  overlay.classList.remove("active");
});
