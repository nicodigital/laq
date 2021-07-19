/*/////////////////////////////// VIDEO ///////////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

let btnVideo = document.getElementById("btn-video");
let overlayVideo = document.getElementById("overlay-video");
let iframeVideo = document.getElementById("iframe-video");
let btnClose = document.getElementById("btn-close");
let bodyV = document.getElementById("top");
let switcherdate = document.getElementById("switcherdate");

if (btnVideo) {
  btnVideo.addEventListener("click", (e) => {
    e.preventDefault();
    bodyV.setAttribute("data-modal", "on");
    overlayVideo.setAttribute("data-flex", "on");
    $videoURL = iframeVideo.getAttribute("data-src");
    iframeVideo.setAttribute("src", $videoURL);

    html.style.overflowY = "hidden";
    document.body.style.overflowY = "hidden";
  });
}

if (btnClose) {
  btnClose.addEventListener("click", (e) => {
    bodyV.setAttribute("data-modal", "off");
    overlayVideo.setAttribute("data-flex", "off");
    iframeVideo.setAttribute("src", "");

    html.style.overflowY = "auto";
    document.body.style.overflowY = "auto";
  });
}


if (switcherdate) {
  switcherdate.addEventListener("click", (e) => {
    e.preventDefault();
    let target = e.target;
    let opciones = Array.from(switcherdate.getElementsByTagName("a"));

    opciones.forEach((op) => {
      op.classList.remove("active");
    });
    target.classList.add("active");

    $videoURL = target.getAttribute("data-src");
    iframeVideo.setAttribute("src", $videoURL);

    console.log(opciones);
  });
}
