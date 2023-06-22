import { TResultPost } from "../../types";

class ResultGeneral {
  data;
  constructor(data: TResultPost[]) {
    this.data = data;
  }

  render() {
    const items = this.data.map(
      (item) => `<li><a href="${item.link}">${item.title.rendered}</a></li>`
    );

    return `
      <ul class="link-list min-list">
        ${items.join("")}
      </ul>
    `;
  }
}

export default ResultGeneral;
