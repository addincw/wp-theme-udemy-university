export type TAuthor = {
  id: number;
  name: string;
  link: string;
  avatar_links: {
    [key: string]: string;
  };
};

export type TFeaturedMedia = {
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

export type TRendered = {
  rendered: string;
};

export type TResultPost = {
  id: number;
  title: TRendered;
  link: string;
  type: string;
  _embedded?: {
    author?: TAuthor[];
    "wp:featuredmedia"?: TFeaturedMedia[];
    [key: string]: object[];
  };
};
export type TResultEvent = TResultPost & {
  excerpt: TRendered;
  date: string;
};
export type TResultProfessor = TResultPost & {
  date: string;
};

export type TResults = {
  campuses: TResultPost[];
  events: TResultEvent[];
  posts: TResultPost[];
  programs: TResultPost[];
  professors: TResultPost[];
};
