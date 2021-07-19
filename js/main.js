import video from "./video.js";
import enterView from "./enter-view.min.js";
import Jump from "./jump.min.js";
import ScrollReveal from "./scrollreveal.js";
// import Push from './push.min.js'
import Swiper from "./swiper.min.js";
// import Swiper, { Navigation, Pagination, Autoplay } from './swiper.min.js';
// Swiper.use([Navigation, Pagination, Autoplay]);
import Rellax from "./rellax.min.js";
/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////// GET URL, PATH  ///////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/
const folder = "cromorama"; // change this for your folder
const host = document.location.host;
const pathname = window.location.pathname; // Returns path only
const url = window.location.href; // Returns full URL
const page = document.querySelector("body").dataset.page;
const site_type = document.querySelector("body").dataset.site_type;
const platform = document.querySelector("html").dataset.platform;
let hard_domain = "";

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////// GET WP VARIABLES ///////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/
// const home_url 	= minimal_local_vars.home_url;
// const theme_url 	= minimal_local_vars.template_url;
// const ajax_url 	= minimal_local_vars.ajax_url;

/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////// SERVICE WORKER ////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

if (host === "localhost:8848") {
  if (site_type == "wp") {
    hard_domain = "http://localhost:8848/" + folder + "/wp";
  } else {
    //is html
    hard_domain = "./";
  }
} else if (host === "clientes.com") {
  if (site_type == "wp") {
    hard_domain = "http://clientes.com/" + folder + "/wp";
  } else {
    //is html
    hard_domain = "./";
  }
} else {
  if (site_type == "wp") {
    hard_domain = host;
  } else {
    //is html
    hard_domain = "./";
  }
}

if ("serviceWorker" in navigator) {
  navigator.serviceWorker
    .register(hard_domain + "sw.js")
    .then((reg) => console.log("Registro de SW exitoso", reg))
    .catch((err) => console.warn("Error al tratar de registrar el sw", err));
}

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////// GET POSITION /////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function get_position(element) {
  let offset_top = element.offsetTop;
  let offset_left = element.offsetLeft;

  console.log("top:" + offset_top + " - " + "left:" + offset_left);
}

let header_brand = document.querySelector("header .brand");
let menu_brand = document.querySelector(".menu-brand");

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////////// GET DEVICE /////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function getDevice() {
  const html = document.querySelector("html");
  const body = document.querySelector("body");
  const header = document.querySelector("header");
  let winW = document.documentElement.clientWidth;
  let winH = document.documentElement.clientHeight;
  let headerH = header.offsetHeight;
  let posters = document.querySelectorAll(".poster");

  let isDesktop = false;
  let isMobile = false;
  let isTablet = false;
  let device = "";

  if (winW >= 1064) {
    isDesktop = true;
    device = "desktop";
  } else if (winW < 1064 && winW > 680) {
    isTablet = true;
    device = "tablet";
  } else if (winW < 680) {
    isMobile = true;
    device = "mobile";
  }

  /* Set Device on HTML tag */
  html.dataset.device = device;

  let device_data = {
    html: html,
    body: body,
    winW: winW,
    winH: winH,
    isDesktop: isDesktop,
    isMobile: isMobile,
    isTablet: isTablet,
    headerH: headerH,
  };

  posters.forEach((poster) => {
    let winInH = window.innerHeight;
    poster.style.height = winInH + "px";
  });

  // get_position(header_brand);
  // get_position(menu_brand);

  return device_data;
}

/* Storage Constant Device Values */
const device_data = getDevice();
const html = device_data.html;
const body = device_data.body;
let winH = device_data.winH;
let winW = device_data.winW;
let isDesktop = device_data.isDesktop;
let isMobile = device_data.isMobile;
let isTablet = device_data.isTablet;
let headerH = device_data.headerH;

/* Ejecutar el getDevice si cambia el tamaño del navegador o rota el dispositivo*/
window.addEventListener("resize", getDevice);
window.addEventListener("orientationchange", getDevice);

/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////// DETECT NAVIGATOR  /////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

var browser = (function (agent) {
  switch (true) {
    case agent.indexOf("edge") > -1:
      return "edge";
    case agent.indexOf("edg/") > -1:
      return "chromium based edge (dev or canary)"; // Match also / to avoid matching for the older Edge
    case agent.indexOf("opr") > -1 && !!window.opr:
      return "opera";
    case agent.indexOf("chrome") > -1 && !!window.chrome:
      return "chrome";
    case agent.indexOf("trident") > -1:
      return "ie";
    case agent.indexOf("firefox") > -1:
      return "firefox";
    case agent.indexOf("safari") > -1:
      return "safari";
    default:
      return "other";
  }
})(window.navigator.userAgent.toLowerCase());

// console.log(browser);

html.dataset.browser = browser;

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////// CHECK ELEMENT ////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function check(element) {
  if (typeof element != "undefined" && element != null) {
    return true;
  } else {
    return false;
  }
}

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////// DETECT SCROLL ////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/
const footer = document.querySelector("footer");

function goUp() {
  let scroll = window.scrollY;

  if (scroll >= footer.offsetTop - 300) {
    body.dataset.scroll = "bottom";
  } else if (scroll >= winH / 4) {
    body.dataset.scroll = "down";
  } else if (scroll == 0) {
    body.dataset.scroll = "top";
  }
}

/*/////////////////////////////////////////////////////////////////////*/
/*/////////////////////////// SMART MENU //////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

let lastScrollTop = "";

function smart_menu() {
  let st = window.scrollY;

  if (st > lastScrollTop) {
    body.dataset.stack = "off";
  } else {
    body.dataset.stack = "on";
  }

  lastScrollTop = st;
}

window.onscroll = (e) => {
  goUp();

  if (platform != "ios" && isMobile === true) {
    smart_menu();
  } else if (isDesktop === true || isTablet === true) {
    smart_menu();
  }
};

// enterView({
// 	selector: '.scroll-counter',
// 	enter: function(el) {
// 		anim_counter();
// 	},
// 	offset: 0.5, // enter at middle of viewport
// 	once: true, // trigger just once
// });
/*///////////////////////////////////////////////////////////////////*/
/*///////////////////////// SMOOTH SCROLL ///////////////////////////*/
/*///////////////////////////////////////////////////////////////////*/

let btnSmooth = document.querySelectorAll(".smooth");

btnSmooth.forEach((btn) => {
  let btnTarget = btn.getAttribute("href");
  let offset_top = btn.dataset.offset;
  // console.log(btnTarget);
  btn.addEventListener("click", function (e) {
    e.preventDefault();
    Jump(btnTarget, {
      offset: -offset_top,
    });
  });
});
/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////// GET URL PARAMS ////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function getUrlParameter(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
  var results = regex.exec(location.search);
  return results === null
    ? ""
    : decodeURIComponent(results[1].replace(/\+/g, " "));
}
// getlang = getUrlParameter('lang');

/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////////// PUSH JS ///////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

// import Push from './push.min.js'

// Push.create("Hello world!", {
//     body: "How's it hangin'?",
//     icon: '/icon.png',
//     timeout: 4000,
//     onClick: function () {
//         window.focus();
//         this.close();
//     }
// });

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////// SWIPER SLIDER //////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

if (page == "galeria" || page == "avances" ) {

  header.classList.add("header-white")

  var swiper = new Swiper("#main-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: 
    {
      delay: 3000,
    },
    loop: true,
  });
} // end home

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////// MENU RESPONSIVE TOGGLER /////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

const btn_togg = document.querySelectorAll(".togg");

function menuToggler() {
  const toggler = document.querySelector("body.toggler");

  if (toggler.classList.contains("menu-in")) {
    toggler.classList.toggle("menu-in");
    html.style.overflowY = "auto";
    body.style.overflowY = "auto";
  } else {
    toggler.classList.toggle("menu-in");
    html.style.overflowY = "hidden";
    body.style.overflowY = "hidden";
  }
}

btn_togg.forEach((btn) => {
  btn.onclick = () => menuToggler();
});

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////////// SWITCHER ///////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

let switcher_container = document.querySelectorAll(".switcher");

switcher_container.forEach((switcher) => {
  let switcher_items = switcher.querySelectorAll(".switcher-item");
  let btn_switch = switcher.querySelectorAll(".switch");

  btn_switch.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      // let data_switch = btn.dataset.switch;
      let data_switch = btn.getAttribute("href");

      btn_switch.forEach((b) => {
        b.classList.remove("active");
      });

      btn.classList.add("active");

      switcher_items.forEach((item) => {
        if (item.classList.contains(data_switch)) {
          item.classList.add("switcher-item-active");

          btn_switch.forEach((b) => {
            b.classList.remove("active");
          });

          btn.classList.add("active");
        } else {
          item.classList.remove("switcher-item-active");
        }
      });
    });
  });
});

/*/////////////////////////////////////////////////////////////////////*/
/*/////////////////////// DOUBLE CLICK BUTTON /////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

// if( isMobile === true || isTablet === true ){

// 	const btn_dbclick =  document.querySelectorAll('.db-click');

// 	btn_dbclick.forEach( btn => {

// 		btn.addEventListener('click', (e) => {
// 			e.preventDefault();

// 			let btn_status 	= btn.dataset.status;
// 			let btn_link 	= btn.getAttribute('href');

// 			if( btn_status == 'out'){
// 				 btn.dataset.status = 'in';
// 			}else{
// 				 // btn.dataset.status = 'out';
// 				 window.location.replace(hard_domain+'/'+btn_link);
// 			}

// 		})

// 	})

// }

/*/////////////////////////////////////////////////////////////////////*/
/*/////////////////////////// PARALLAX ////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

/* Common Parallax */
var rellax = new Rellax(".rellax", {
  center: true,
});

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////////// ACCORDION //////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

function startAccordion(elem, option) {
  //addEventListener on mouse click
  document.addEventListener("click", function (e) {
    //check is the right element clicked
    if (!e.target.matches(elem + " .a-btn")) return;
    else {
      //check if element contains active class
      if (!e.target.parentElement.classList.contains("active")) {
        if (option == true) {
          //if option true remove active class from all other accordions
          var elementList = document.querySelectorAll(elem + " .a-container");
          Array.prototype.forEach.call(elementList, function (e) {
            e.classList.remove("active");
          });
        }
        //add active class on cliked accordion
        e.target.parentElement.classList.add("active");
      } else {
        //remove active class on cliked accordion
        e.target.parentElement.classList.remove("active");
      }
    }
  });
}

// Start Accordion
// True 	= permite elegir solo un elemento
// False 	= permite elegir solo multiples elementos
startAccordion(".accordion", true);

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////////// TABS /////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

const tab_switcher = document.querySelectorAll(".tab-switcher a");
const tabs = document.querySelectorAll(".tab-content");

if (check(tab_switcher)) {
  tab_switcher.forEach((btn_tab) => {
    btn_tab.onclick = function (e) {
      e.preventDefault();

      let tab_target = btn_tab.getAttribute("href");

      tab_switcher.forEach((btn) => {
        btn.classList.remove("active");
      });

      btn_tab.classList.add("active");

      tabs.forEach((tab) => {
        let tab_data = tab.dataset.tab;

        if (tab_data == tab_target) {
          tab.classList.add("active");
        } else {
          tab.classList.remove("active");
        }
      });
    };
  });
}

/*/////////////////////////////////////////////////////////////////////*/
/*////////////////////////////// MODAL ////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

const modal_links = document.querySelectorAll(".link-modal");
const btn_close = document.querySelectorAll(".modal .close");

modal_links.forEach((btn_modal) => {
  btn_modal.onclick = (e) => {
    e.preventDefault();

    /* open modal */
    let modal_link = btn_modal.getAttribute("href");
    let modal = document.querySelector(".modal[data-modal=" + modal_link + "]");
    html.dataset.modal = "on";
    modal.dataset.show = "on";

    /* close modal */
    // btn_close.onclick = (e) => {
  };

  btn_close.forEach((close) => {
    close.addEventListener("click", (e) => {
      e.preventDefault();
      let this_modal = close.parentNode;
      this_modal.dataset.show = "off";
      html.dataset.modal = "off";
    });
  });
});

/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////////// DARK MODE /////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

let btn_dark_theme = document.querySelector(".btn-dark-theme");

if (check(btn_dark_theme)) {
  // press the btn_dark_theme to toggle the .dark-mode class
  btn_dark_theme.addEventListener("click", () => {
    document.documentElement.classList.toggle("dark-mode");

    document.querySelector("no-dark").forEach((element) => {
      element.classList.toggle("no-invert");
    });
  });
}

/*/////////////////////////////////////////////////////////////////////*/
/*///////////////////////// SCROLL ANIMATIONS /////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

window.sr = ScrollReveal();

const STEPS_DELAY = [
  100,
  200,
  300,
  400,
  500,
  600,
  700,
  800,
  900,
  1000,
  1100,
  1200,
  1300,
  1400,
  1500,
  1600,
  1700,
  1800,
  1900,
  2000,
];

STEPS_DELAY.forEach((step) => {
  sr.reveal(".move-top-" + step, {
    origin: "bottom",
    duration: 1000,
    distance: "-15px",
    delay: step,
    reset: false,
    easing: "ease",
    viewOffset: {
      top: 60,
    },
    mobile: false,
  });

  sr.reveal(".move-bottom-" + step, {
    origin: "bottom",
    duration: 1000,
    distance: "30px",
    delay: step,
    reset: false,
    easing: "ease",
    viewOffset: {
      top: 60,
    },
    mobile: false,
  });

  sr.reveal(".move-left-" + step, {
    origin: "left",
    duration: 1000,
    distance: "30px",
    delay: step,
    reset: false,
    easing: "ease",
    viewOffset: {
      top: 60,
    },
    mobile: false,
  });

  sr.reveal(".move-right-" + step, {
    origin: "right",
    duration: 1000,
    distance: "30px",
    delay: step,
    reset: false,
    easing: "ease",
    viewOffset: {
      top: 60,
    },
    mobile: false,
  });
});


/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////////// #MENU //////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

link_ubicacion.addEventListener('click', (e) => {
  if (page=="home") {
    setTimeout(menuToggler, 500);
  }
});

link_equipo.addEventListener('click', (e) => {
  if (page=="home") {
    setTimeout(menuToggler, 500);
  }
});

/*/////////////////////////////////////////////////////////////////////*/
/*//////////////////////////// PLANTAS ////////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

let filter_items 	= document.querySelectorAll('#filter a');

if( check(filter_items) ){

	let planos 			= document.querySelectorAll('.planos img');
  let sketchs 		= document.querySelectorAll('.sketch img');

  let area_title 			 = document.querySelector('.area-title');
  let area_propia      = document.querySelector('.area-propia span');
  let area_dormitorios = document.querySelector('.area-dormitorios');

  let area_jardin 	   = document.querySelector('.area-jardin span');
  let area_terrazas 	 = document.querySelector('.area-terrazas span');
  let area_boxtender	 = document.querySelector('.area-boxtender span');
  let area_rooftop	   = document.querySelector('.area-rooftop span');

	let ficha_download 	= document.querySelector('.ficha-download');

	// console.log(ficha_download);

	filter_items.forEach( btn =>{

		btn.addEventListener('click', (e) => {
			e.preventDefault();
			let planta = btn.getAttribute('href');

			/* Estado de los botones*/
			filter_items.forEach( b =>{
				b.classList.remove('active');
			});

			btn.classList.add('active');

			/* Ocultar o mostrar planos */
			planos.forEach( plano =>{
				let plano_data = plano.dataset.plano;
				if(plano_data == planta){
					plano.classList.add('active');
				}else{
					plano.classList.remove('active');
				}
			});

			/* Ocultar o mostrar sketch */
			sketchs.forEach( sketch =>{
				let plano_data = sketch.dataset.plano;
				if(plano_data == planta){
					sketch.classList.add('active');
				}else{
					sketch.classList.remove('active');
  			}
			});      

			/* Cambiar info de la planta*/
			fetch('inc/plantas.json').then(response => {
			  return response.json();
			}).then(data => {
			  // Work with JSON data here
			  console.log(data);

			  let get_title	 		= data[planta].title;
			  let get_area_dormitorios 	= data[planta].area_dormitorios;
        let get_area_propia 	= data[planta].area_propia;

			  let get_area_jardin 	= data[planta].area_jardin;
			  let get_area_terrazas 	= data[planta].area_terrazas;
			  let get_area_boxtender	= data[planta].area_boxtender;
			  let get_area_rooftop 	= data[planta].area_rooftop;                

			  area_title.innerHTML 	  	 = get_title;
			  area_dormitorios.innerHTML = get_area_dormitorios;
        area_propia.innerHTML      = get_area_propia;

        if (get_area_jardin=="" || get_area_jardin == null) {
          area_jardin.parentNode.classList.add("hide");
        }else{
          area_jardin.parentNode.classList.remove("hide");
          area_jardin.innerHTML = get_area_jardin;
        }

        if (get_area_terrazas=="" || get_area_terrazas == null) {
          area_terrazas.parentNode.classList.add("hide");
        }else{
          area_terrazas.parentNode.classList.remove("hide");
          area_terrazas.innerHTML  = get_area_terrazas;
        }

        if (get_area_boxtender=="" || get_area_boxtender == null) {
          area_boxtender.parentNode.classList.add("hide");
        }else{
          area_boxtender.parentNode.classList.remove("hide");
          area_boxtender.innerHTML = get_area_boxtender;
        }

        if (get_area_rooftop=="" || get_area_rooftop == null) {
          area_rooftop.parentNode.classList.add("hide");
        }else{
          area_rooftop.parentNode.classList.remove("hide");
          area_rooftop.innerHTML = get_area_rooftop;
        }
        
			  ficha_download.setAttribute('href', 'plantas/pdf/'+planta+'.pdf' );

        console.log("Datos");
      }).catch(err => 
        {
          // console.log(err);
			  // Do something for an error here
			});

		});

	});

}