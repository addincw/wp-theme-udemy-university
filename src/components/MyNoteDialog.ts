class MyNoteDialog {
  BtnOpens: NodeListOf<HTMLElement>;
  BtnClose: HTMLButtonElement;
  Dialog: HTMLDivElement;

  constructor() {
    this.BtnOpens = document.querySelectorAll(".create-note-dialog__open");
    this.BtnClose = document.querySelector(".create-note-dialog__close");

    this.Dialog = document.querySelector(".create-note-dialog");
  }

  enable() {
    this.BtnOpens.forEach((BtnOpen) => {
      BtnOpen.addEventListener("click", this._open.bind(this));
    });
    this.BtnClose.addEventListener("click", this._close.bind(this));

    this.Dialog.addEventListener("click", this._close.bind(this));
  }

  _open() {
    this.Dialog.classList.add("create-note-dialog--show");
    document.body.classList.add("body-no-scroll");
  }

  _close() {
    this.Dialog.classList.remove("create-note-dialog--show");
    document.body.classList.remove("body-no-scroll");
  }
}

export default MyNoteDialog;
