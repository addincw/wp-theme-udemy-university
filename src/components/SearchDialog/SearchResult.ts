import { TResultPost } from "../../types";
import ResultEvent from "./ResultEvent";
import ResultGeneral from "./ResultGeneral";
import ResultProfessor from "./ResultProfessor";

class SearchResult {
  Container;
  data;

  constructor(data: TResultPost[]) {
    this.data = data;

    const Container = document.createElement("div");
    Container.classList.add("row");

    this.Container = Container;
  }

  render() {
    const generalContent = new ResultGeneral(this.data).render();
    this._addSection("General Information", generalContent);

    const programContent = new ResultGeneral(this.data).render();
    const SectionProgram = this._addSection("Programs", programContent);

    SectionProgram.append(this._createSectionTitle("Professors"));
    const professorContent = new ResultProfessor(this.data).render();
    SectionProgram.insertAdjacentHTML("beforeend", professorContent);

    const campusContent = new ResultGeneral(this.data).render();
    const SectionCampus = this._addSection("Campuses", campusContent);

    SectionCampus.append(this._createSectionTitle("Events"));
    const eventContent = new ResultEvent(this.data).render();
    SectionCampus.insertAdjacentHTML("beforeend", eventContent);

    return this.Container;
  }

  _addSection(title: string = "", content: string = "") {
    const SectionTitle = this._createSectionTitle(title);

    const Section = document.createElement("div");
    Section.classList.add("one-third");
    Section.append(SectionTitle);
    Section.insertAdjacentHTML("beforeend", content);

    this.Container.append(Section);

    return Section;
  }

  _createSectionTitle(title: string = "") {
    const SectionTitle = document.createElement("h2");
    SectionTitle.classList.add("search-overlay__section-title");
    SectionTitle.innerText = title;

    return SectionTitle;
  }
}

export default SearchResult;
