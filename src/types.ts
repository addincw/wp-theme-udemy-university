export type Author = {
  id: number;
  name: string;
  link: string;
  avatar_links: {
    [key: string]: string;
  };
};

export type FeaturedMedia = {
  id: string;
  date: string;
  alt_text: string;
  media_type: string;
  mime_type: string;
  media_details: {
    sizes: {
      [Property in keyof "medium" | "medium" | "thumbnail" | "full"]: {
        width: number;
        height: number;
        source_url: string;
      };
    };
  };
  source_url: string;
};

export type Rendered = {
  raw: string;
  rendered: string;
};

export type ResultError = {
  code: string;
  data: {
    status: number;
  };
  message: string;
};

export type ResultPost = {
  id: number;
  title: Rendered;
  content?: Rendered;
  link: string;
  type: string;
  _embedded?: {
    author?: Author[];
    "wp:featuredmedia"?: FeaturedMedia[];
    [key: string]: object[];
  };
};
export type ResultEvent = ResultPost & {
  excerpt: Rendered;
  date: string;
};
export type ResultProfessor = ResultPost & {
  date: string;
};

export type SearchResult = {
  campuses: ResultPost[];
  events: ResultEvent[];
  posts: ResultPost[];
  programs: ResultPost[];
  professors: ResultPost[];
};

export type RequestData = {
  [key: string]: string;
};
