const themeSlug = "untitled";

function clearForm(formId) {
  document.getElementById(formId).reset();
}
window.addEventListener("message", (event) => {
  if (event?.data?.zoom) {
    const mains = document.getElementsByTagName('main')
    for (let main of mains) {
      main.style.zoom = event?.data?.zoom
    }
  }
}, false);

async function form_adfe099c117c(event) {
  event.preventDefault();
  const data = new FormData(event.target);
  const loader = JSAlert.loader("Please wait...");
  try {
    const formResponse = await fetch(
      `${window.location.origin}/wp-json/yotako/v1/form`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          form: "form_adfe099c117c",
          data: Object.fromEntries(data),
          slug: themeSlug,
        }),
      });
    if (formResponse.status === 200) {
      loader.dismiss();
      const alert = new JSAlert("Form submitted successfully!").dismissIn(
        1000 * 7
      );
      alert.addButton("Ok");
      alert.setIcon(JSAlert.Icons.Success);
      alert.show();
    }
    clearForm("form_adfe099c117c");
  } catch (err) {
    loader.dismiss();
    clearForm("form_adfe099c117c");
  }
}


document.addEventListener('DOMContentLoaded', () => {
  document.getElementsByTagName('body')[0].style.overflowX = "hidden"

  function applyZoom() {
    const vpTags = document.getElementsByClassName('ytk-apply-zoom');
    let closest;
    let parentElement;
    for (let vp of vpTags) {
      if (vp.offsetParent) {
        vp.classList.forEach(c => {
          if (c.includes('size_')) {
            parentElement = vp.parentElement;
            closest = c.split('_')[1];
          }
        });
      }
    }

    const zoom = window.innerWidth / closest;
    if (parentElement) {
      parentElement.style.zoom = isNaN(zoom) ? 1 : zoom;
    }
  }
  window.onresize = function() {
    applyZoom();
  };
  setTimeout(() => {
    applyZoom();
  }, 500);

});