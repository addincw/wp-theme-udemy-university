import { TAuthor, TResultPost } from "../../types";

class ResultGeneral {
  data;
  constructor(data: TResultPost[]) {
    this.data = data;
  }

  render() {
    const items = this.data.map((item) => {
      const [author] = item._embedded?.author ?? [];

      const isPost = item.type === "post";
      const createdBy = isPost && author?.name ? `by ${author.name}` : "";

      return `<li>
        <a href="${item.link}">${item.title.rendered}</a>
        ${createdBy}
      </li>`;
    });

    return `
      <ul class="link-list min-list">
        ${items.join("")}
      </ul>
    `;
  }
}

export default ResultGeneral;
