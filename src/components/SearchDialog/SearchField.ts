class SearchField {
  SearchField: HTMLInputElement;

  debounce: NodeJS.Timeout;
  oldKeyword = "";

  constructor() {
    this.SearchField = document.querySelector("#search-term");
  }

  enable(debounceCallback?: (keyword: string) => void) {
    this.SearchField.addEventListener("keyup", (e) => {
      const keyword = (e.target as HTMLInputElement).value;

      if (this.oldKeyword === keyword) return;

      clearTimeout(this.debounce);

      this.debounce = setTimeout(async () => {
        debounceCallback?.(keyword);
        this.oldKeyword = keyword;
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
