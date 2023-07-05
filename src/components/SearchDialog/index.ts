import {
  getSearchCampuses,
  getSearchEvents,
  getSearchPosts,
  getSearchProfessors,
  getSearchPrograms,
} from "../../api";
import { ResultEvent, ResultPost, SearchResult } from "../../types";
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

    this.SearchField.enable(this._doSearch.bind(this));
  }

  _doSearch(keyword: string) {
    this.DialogBody.classList.add("search-overlay__results--center");
    this.DialogBody.replaceChildren(this.Loader);

    type TSetResult =
      | PromiseSettledResult<ResultEvent[]>
      | PromiseSettledResult<ResultPost[]>;

    const getFulValue = (settled: TSetResult): ResultPost[] => {
      if (settled.status !== "fulfilled") return [];
      return settled.value;
    };

    Promise.allSettled([
      getSearchEvents(keyword),
      getSearchCampuses(keyword),
      getSearchPosts(keyword),
      getSearchPrograms(keyword),
      getSearchProfessors(keyword),
    ]).then(
      ([setEvents, setCampuses, setPosts, setPrograms, setProfessors]) => {
        const results = {
          events: getFulValue(setEvents) as ResultEvent[],
          campuses: getFulValue(setCampuses),
          posts: getFulValue(setPosts),
          programs: getFulValue(setPrograms),
          professors: getFulValue(setProfessors),
        };

        this.DialogBody.classList.remove("search-overlay__results--center");
        this.DialogBody.replaceChildren(new SearchResult(results).render());
      }
    );
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
