import Glide, { Options } from "@glidejs/glide";

class HeroSlider {
  selector = ".hero-slider";

  enable() {
    if (!document.querySelector(this.selector)) return;

    const options: Partial<Options> = {
      type: "carousel",
      perView: 1,
      autoplay: 3000,
    };

    new Glide(this.selector, options).mount();

    this._addDotControls();
  }

  _addDotControls() {
    const DotControls = document.querySelector(".glide__bullets");
    const Slides = document.querySelectorAll(".hero-slider__slide");

    Slides.forEach((Item, i) => {
      if (Item.classList.contains("glide__slide--clone")) return;

      const dotControl = document.createElement("button");
      dotControl.classList.add("slider__bullet", "glide__bullet");
      dotControl.setAttribute("data-glide-dir", `${i}`);

      DotControls.insertAdjacentElement("beforeend", dotControl);
    });
  }
}

export default HeroSlider;
