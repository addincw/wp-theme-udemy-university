import { TResultEvent } from "../../types";

class ResultEvent {
  data;
  constructor(data?: TResultEvent[]) {
    this.data = data ?? [];
  }

  render() {
    return this.data
      .map((item) => {
        const dtFormatter = new Intl.DateTimeFormat("en-US", {
          day: "2-digit",
          month: "short",
        });

        const [eventMonth, eventDate] = dtFormatter
          .format(new Date(item.date))
          .split(" ");

        return `<div class="event-summary">
          <a class="event-summary__date t-center" href="${item.link}">
              <span class="event-summary__month">${eventMonth}</span>
              <span class="event-summary__day">${eventDate}</span>
          </a>
          <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny">
                  <a href="${item.link}">${item.title.rendered}</a>
              </h5>
              <p>
                ${item.excerpt?.rendered ?? ""}
                <a href="${item.link}" class="nu gray">Read more</a>
              </p>
          </div>
        </div>`;
      })
      .join("");
  }
}

export default ResultEvent;
