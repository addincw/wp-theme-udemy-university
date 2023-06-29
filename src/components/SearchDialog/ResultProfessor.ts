import { TResultPost } from "../../types";

class ResultProfessor {
  data;
  constructor(data: TResultPost[]) {
    this.data = data;
  }

  render() {
    const items = this.data.map((item) => {
      let thumbnailAlt = item.title.rendered;
      let thumbnailUrl = "/wp-content/uploads/2023/06/meowsalot.jpg";

      if (item._embedded?.["wp:featuredmedia"]?.length) {
        const [featuredmedia] = item._embedded["wp:featuredmedia"];

        thumbnailAlt = featuredmedia.alt_text ?? thumbnailAlt;
        thumbnailUrl =
          featuredmedia.media_details.sizes.medium?.source_url ??
          featuredmedia.source_url;
      }

      return `<li class="professor-card__list-item">
        <a href="${item.id}" class="professor-card">
          <img class="professor-card__image" src="${thumbnailUrl}" alt="${thumbnailAlt}" />
          <span class="professor-card__name">${item.title.rendered}</span>
        </a>
      </li>`;
    });

    return `<ul class="professor-cards">
      ${items.join("")}
    </ul>`;
  }
}

export default ResultProfessor;
