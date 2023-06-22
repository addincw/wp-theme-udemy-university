import { TResultPost } from "../../types";

class ResultProfessor {
  data;
  constructor(data: TResultPost[]) {
    this.data = data;
  }

  render() {
    const items = this.data.map((item) => {
      //TODO: should change dummy image with real image
      return `<li class="professor-card__list-item">
        <a href="${item.id}" class="professor-card">
          <img class="professor-card__image" src="http://wp-udemy-university.test/wp-content/uploads/2023/06/meowsalot.jpg" alt="${item.title.rendered}" />
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
