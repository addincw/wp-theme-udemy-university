import { TResultPost } from "../types";

const BASE_URL = "/wp-json/wp/v2";

export async function getSearch(keyword: string): Promise<TResultPost[]> {
  const resp = await fetch(`${BASE_URL}/posts`);
  const data = await resp.json();

  return data;
}
