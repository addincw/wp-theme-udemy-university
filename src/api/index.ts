import { ResultEvent, ResultPost } from "../types";
import { BASE_URL, FETCH_OPTS } from "./config";

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

// TODO: should return only matched title
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

// TODO: should return only matched title, or professor related program
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
