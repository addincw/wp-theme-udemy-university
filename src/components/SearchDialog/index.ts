import { getSearch } from "../../api";
import SearchField from "./SearchField";
import SearchResult from "./SearchResult";

class SearchDialog {
  BtnOpens: NodeListOf<HTMLElement>;
  BtnClose: HTMLElement;
  Dialog: HTMLElement;
  DialogBody: HTMLElement;
  Loader: HTMLDivElement;
  SearchField: SearchField;

  constructor() {
    this.BtnOpens = document.querySelectorAll(".js-search-trigger");
    this.BtnClose = document.querySelector(".search-overlay__close");

    this.Dialog = document.querySelector(".search-overlay");
    this.DialogBody = document.querySelector("#search-overlay__results");

    const Loader = document.createElement("div");
    Loader.classList.add("spinner-loader");
    this.Loader = Loader;

    this.SearchField = new SearchField();
  }

  enable() {
    this.BtnOpens.forEach((BtnOpen) => {
      BtnOpen.addEventListener("click", this._open.bind(this));
    });
    this.BtnClose.addEventListener("click", this._close.bind(this));

    this.SearchField.enable(async (keyword: string) => {
      this.DialogBody.classList.add("search-overlay__results--center");
      this.DialogBody.replaceChildren(this.Loader);

      const results = await getSearch(keyword);

      this.DialogBody.classList.remove("search-overlay__results--center");
      this.DialogBody.replaceChildren(new SearchResult(results).render());
    });
  }

  _shortcut(e: KeyboardEvent) {
    if (e.key !== "Escape") return;

    this._close();
  }

  _open() {
    this.Dialog.classList.add("search-overlay--active");
    document.body.classList.add("body-no-scroll");

    this.Dialog.addEventListener("keydown", this._shortcut.bind(this));

    setTimeout(() => this.SearchField.focus(), 300);
  }

  _close() {
    this.Dialog.classList.remove("search-overlay--active");
    this.DialogBody.replaceChildren("");

    document.body.classList.remove("body-no-scroll");

    this.Dialog.removeEventListener("keydown", this._shortcut.bind(this));

    this.SearchField.blur();
    this.SearchField.value("");
  }
}

export default SearchDialog;
