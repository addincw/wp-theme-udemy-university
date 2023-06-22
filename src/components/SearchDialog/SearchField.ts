import { getSearch } from "../../api";
import SearchResult from "./SearchResult";

class SearchField {
  DialogBody: HTMLElement;
  Loader: HTMLDivElement;
  SearchField: HTMLInputElement;

  debounce: NodeJS.Timeout;
  oldKeyword = "";

  constructor() {
    this.DialogBody = document.querySelector("#search-overlay__results");

    const Loader = document.createElement("div");
    Loader.classList.add("spinner-loader");
    this.Loader = Loader;

    this.SearchField = document.querySelector("#search-term");
  }

  enable() {
    this.SearchField.addEventListener("keyup", (e) => {
      const keyword = (e.target as HTMLInputElement).value;

      if (this.oldKeyword === keyword) return;

      clearTimeout(this.debounce);

      this.debounce = setTimeout(async () => {
        this.DialogBody.classList.add("search-overlay__results--center");
        this.DialogBody.replaceChildren(this.Loader);

        const results = await getSearch(keyword);
        this.oldKeyword = keyword;

        this.DialogBody.classList.remove("search-overlay__results--center");
        this.DialogBody.replaceChildren(new SearchResult(results).render());
      }, 300);
    });
  }

  focus() {
    this.SearchField.focus();
  }

  blur() {
    this.SearchField.blur();
  }

  value(value = "") {
    this.SearchField.value = value;
  }
}

export default SearchField;
