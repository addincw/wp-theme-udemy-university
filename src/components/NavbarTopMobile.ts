class NavbarTopMobile {
  Btn;
  Menus;

  constructor() {
    this.Btn = document.querySelector(".site-header__menu-trigger");
    this.Menus = document.querySelector(".site-header__menu");
  }

  enable() {
    this.Btn.addEventListener("click", this._toggleMenus.bind(this));
  }

  _toggleMenus(e: Event) {
    const btnEl = e.target as HTMLButtonElement;

    btnEl.classList.toggle("fa-bars");
    btnEl.classList.toggle("fa-window-close");

    this.Menus.classList.toggle("site-header__menu--active");
  }
}

export default NavbarTopMobile;
