import { createNote } from "../api/my-notes";
import { RequestData, ResultError, ResultPost } from "../types";
import MyNoteList from "./MyNoteList";

class MyNoteDialog {
  BtnOpens: NodeListOf<HTMLElement>;
  BtnClose: HTMLButtonElement;
  BtnSubmit: HTMLButtonElement;
  Dialog: HTMLDivElement;
  Form: HTMLFormElement;
  Loader: HTMLDivElement;

  SubmitMessage: HTMLSpanElement;
  submitMessageDefault: string;

  inPage: boolean;

  constructor() {
    this.BtnOpens = document.querySelectorAll(".create-note-dialog__open");
    this.BtnClose = document.querySelector(".create-note-dialog__close");
    this.BtnSubmit = document.querySelector(".submit-note");
    this.Dialog = document.querySelector(".create-note-dialog");
    this.Form = document.querySelector(".create-note form") as HTMLFormElement;
    this.Loader = document.querySelector(".create-note__loading");

    this.SubmitMessage = document.querySelector(
      ".create-note-dialog .create-note .create-note__message"
    );
    this.submitMessageDefault = this.SubmitMessage.innerText;

    this.inPage = false;
  }

  enable() {
    this.BtnOpens.forEach((BtnOpen) => {
      BtnOpen.addEventListener("click", this._open.bind(this, BtnOpen));
    });
    this.BtnClose.addEventListener("click", this._close.bind(this));
    this.BtnSubmit.addEventListener("click", this._submit.bind(this));

    this.Dialog.addEventListener("click", this._close.bind(this));
  }

  _resetSubmitMessage() {
    this.SubmitMessage.classList.remove("active", "success");
    this.SubmitMessage.innerText = this.submitMessageDefault;
  }

  _open(ThisBtn: HTMLElement) {
    this.Form.reset();
    this._resetSubmitMessage();

    this.inPage = ThisBtn.dataset?.inpage === "1";
    console.log(this.inPage);

    this.Dialog.classList.add("create-note-dialog--show");
    document.body.classList.add("body-no-scroll");
  }

  _close() {
    if (this.Loader.classList.contains("create-note__loading--show")) {
      return;
    }

    this._resetSubmitMessage();

    this.Dialog.classList.remove("create-note-dialog--show");
    document.body.classList.remove("body-no-scroll");
  }

  _refreshMyNoteList(newNote: ResultPost) {
    MyNoteList.appendItem(newNote);

    const myNoteList = new MyNoteList();
    myNoteList.enable();
  }

  _getValidatedData(): RequestData {
    let fieldEmpties: string[] = [];
    let data: RequestData = {};

    Array.from(this.Form.elements).forEach((field: HTMLInputElement) => {
      if (field.nodeName === "BUTTON") return;

      if (!field.value) {
        fieldEmpties.push(field.name);
      }

      data[field.name] = field.value;
    });

    if (fieldEmpties.length) {
      throw new Error(`Column: ${fieldEmpties.join(", ")} cannot be empty.`);
    }

    return data;
  }

  async _submit() {
    let result;
    let isError = false;

    this.Loader.classList.add("create-note__loading--show");

    try {
      const data = this._getValidatedData();

      result = await createNote(data);

      const resultError = result as ResultError;

      if (resultError?.data?.status) {
        throw new Error(resultError.message);
      }

      this.SubmitMessage.innerText = "success creating a note";
      this.SubmitMessage.classList.add("success");

      this.Form.reset();
    } catch (error) {
      isError = true;

      this._resetSubmitMessage();
      this.SubmitMessage.innerText = error.message;
    } finally {
      this.SubmitMessage.classList.add("active");
      this.Loader.classList.remove("create-note__loading--show");

      if (this.inPage && !isError) {
        this._close();
        this._refreshMyNoteList(result as ResultPost);
      }
    }
  }
}

export default MyNoteDialog;
