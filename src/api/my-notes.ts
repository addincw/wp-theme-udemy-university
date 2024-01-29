import { RequestData, ResultError, ResultPost } from "../types";
import { BASE_URL, FETCH_OPTS } from "./config";

function getAuthOpts(): RequestInit {
  const { headers, ...opts } = FETCH_OPTS;

  return {
    ...opts,
    headers: {
      ...headers,
      "X-WP-Nonce": document.getElementsByTagName("body")[0]?.dataset?.nt ?? "",
    },
  };
}

export async function createNote(
  data: RequestData
): Promise<ResultPost | ResultError> {
  const OPTS = getAuthOpts();

  const resp = await fetch(`${BASE_URL}/wp/v2/my-note`, {
    ...OPTS,
    method: "POST",
    body: JSON.stringify(data),
  });

  return await resp.json();
}
