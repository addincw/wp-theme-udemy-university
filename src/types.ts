type Rendered = {
  rendered: String;
};

export type TResultPost = {
  id: Number;
  title: Rendered;
  content: Rendered;
  excerpt: Rendered;
  featured_media?: Number;
  link: String;
  date: string | number | Date;
};
