import { ResultEvent, ResultPost } from "../types";

const BASE_URL = "/wp-json";
const FETCH_OPTS = {
  headers: {
    "Content-Type": "application/json",
  },
};

// TODO: bug, still showing old event, and in admin page old event not show (should show)
export async function getSearchEvents(keyword: string): Promise<ResultEvent[]> {
  const params = new URLSearchParams({
    search: keyword,
    per_page: "4",
  });

  const resp = await fetch(`${BASE_URL}/wp/v2/event?${params.toString()}`, {
    ...FETCH_OPTS,
  });
  return await resp.json();
}

export async function getSearchCampuses(
  keyword: string
): Promise<ResultPost[]> {
  const params = new URLSearchParams({
    search: keyword,
    per_page: "4",
  });

  const resp = await fetch(`${BASE_URL}/wp/v2/campus?${params.toString()}`, {
    ...FETCH_OPTS,
  });
  return await resp.json();
}

export async function getSearchPosts(keyword: string): Promise<ResultPost[]> {
  const params = new URLSearchParams({
    _embed: "author",
    search: keyword,
    per_page: "10",
  });

  const resp = await fetch(`${BASE_URL}/wp/v2/posts?${params.toString()}`, {
    ...FETCH_OPTS,
  });
  return await resp.json();
}

export async function getSearchPrograms(
  keyword: string
): Promise<ResultPost[]> {
  const params = new URLSearchParams({
    search: keyword,
    per_page: "4",
  });

  const resp = await fetch(`${BASE_URL}/wp/v2/program?${params.toString()}`, {
    ...FETCH_OPTS,
  });
  return await resp.json();
}

export async function getSearchProfessors(
  keyword: string
): Promise<ResultPost[]> {
  const params = new URLSearchParams({
    _embed: "wp:featuredmedia",
    search: keyword,
    per_page: "4",
  });

  const resp = await fetch(`${BASE_URL}/wp/v2/professor?${params.toString()}`, {
    ...FETCH_OPTS,
  });
  return await resp.json();
}
