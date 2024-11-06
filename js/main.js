let links = document.querySelectorAll('.link')


links.forEach((e) => {
  e.addEventListener('click', () => {
    links.forEach((e) => { e.classList.remove('active') })
    e.classList.add('active')
  })
})

let drop = document.querySelectorAll('.drop');

drop.forEach((e) => {
  e.addEventListener('click', () => {
    e.classList.toggle('active');
  })
})


let goTop = document.querySelector(".goTop");
let footer = document.querySelector("footer");

goTop.addEventListener("click", () => {
  window.scrollTo(0, 0);
});

window.addEventListener("scroll", () => {
  if (window.scrollY >= 400) {
    goTop.style.display = "block";
  } else {
    goTop.style.display = "none";
  }
  if (window.scrollY >= footer.offsetTop - 600) {
    if (homeMedia && goTop) {
      goTop.style.display = "none";
      homeMedia.style.display = "none";
    }
  } else {
    if (homeMedia && goTop) {
      goTop.style.display = "block";
      homeMedia.style.display = "flex";
    }
  }
});


function toggleMenu() {
  var close = document.getElementById("closeicon");
  var menuItems = document.getElementById("menuItems");
  if (menuItems.style.display === "none" || menuItems.style.display === "") {
      menuItems.style.display = "block";
      close.style.display = "block";
  } else {
      menuItems.style.display = "none";
      close.style.display = "none";
  }
}

// Start Faqs
let faqs = document.querySelectorAll(".faq");

faqs.forEach((e) => {
  e.addEventListener("click", () => {
    faqs.forEach((el) => {
      el !== e ? el.classList.remove("active") : "";
    });
    e.classList.toggle('active');
  });
});

// End Faqs

