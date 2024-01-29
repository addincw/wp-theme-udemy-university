import { ResultPost } from "../types";

class MyNoteList {
  MyNoteItems: NodeListOf<HTMLLIElement>;

  constructor() {
    this.MyNoteItems = document.querySelectorAll("ul#my-notes li");
  }

  enable() {
    this.MyNoteItems.forEach((MyNoteItem) => {
      const BtnEdit = MyNoteItem.querySelector(".edit-note");
      BtnEdit.addEventListener(
        "click",
        this._toggleItemEdit.bind(this, BtnEdit, MyNoteItem)
      );

      const BtnDelete = MyNoteItem.querySelector(".delete-note");
      BtnDelete.addEventListener(
        "click",
        this._deleteItem.bind(this, MyNoteItem)
      );

      const BtnSubmitEdit = MyNoteItem.querySelector(".update-note");
      BtnSubmitEdit.addEventListener(
        "click",
        this._updateItem.bind(this, MyNoteItem)
      );
    });
  }

  static appendItem(data: ResultPost) {
    const itemHTML = `
      <li data-id="${data.id}">
        <form>
            <input readonly="" class="note-title-field" name="title" value="${data.title.raw}">

            <div class="actions">
                <button type="button" class="edit-note">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    &nbsp;
                    Edit
                </button>
                <button type="button" class="delete-note">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    &nbsp;
                    Delete
                </button>
            </div>

            <textarea readonly="" class="note-body-field" name="body">${data.content?.raw}</textarea>

            <button type="button" class="update-note btn btn--blue btn--small">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                &nbsp;
                Save
            </button>
        </form>
      </li>
    `;

    const MyNoteUl = document.querySelector("ul#my-notes");
    MyNoteUl.insertAdjacentHTML("afterbegin", itemHTML);
  }

  _toggleItemEdit(ThisBtnEdit: HTMLButtonElement, MyNoteItem: HTMLLIElement) {
    const MyNoteItemTitle = MyNoteItem.querySelector(".note-title-field");
    const MyNoteItemBody = MyNoteItem.querySelector(".note-body-field");
    const MyNoteItemSubmit = MyNoteItem.querySelector(".update-note");

    // set item fields as readonly
    if (MyNoteItem.dataset?.inedit) {
      ThisBtnEdit.innerHTML = `<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit`;
      delete MyNoteItem.dataset.inedit;

      MyNoteItemTitle.classList.remove("note-active-field");
      MyNoteItemTitle.setAttribute("readonly", "true");

      MyNoteItemBody.classList.remove("note-active-field");
      MyNoteItemBody.setAttribute("readonly", "true");

      MyNoteItemSubmit.classList.remove("update-note--visible");
      return;
    }

    // set item fields as editable
    ThisBtnEdit.innerHTML = `<i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel`;
    MyNoteItem.dataset.inedit = "true";

    MyNoteItemTitle.classList.add("note-active-field");
    MyNoteItemTitle.removeAttribute("readonly");

    MyNoteItemBody.classList.add("note-active-field");
    MyNoteItemBody.removeAttribute("readonly");

    MyNoteItemSubmit.classList.add("update-note--visible");
  }

  _updateItem(MyNoteItem: HTMLLIElement) {
    const { id } = MyNoteItem.dataset;
    const Form = MyNoteItem.querySelector("form") as HTMLFormElement;

    let data: { [key: string]: string } = {};
    Array.from(Form.elements).forEach((field: HTMLInputElement) => {
      if (field.nodeName === "BUTTON") return;

      data[field.name] = field.value;
    });

    console.log(`update item ${id}: `, data);
  }

  _deleteItem(MyNoteItem: HTMLLIElement) {
    const { id } = MyNoteItem.dataset;

    if (window.confirm("sure to delete this note?")) {
      console.log(`delete item ${id}`);
      return;
    }
  }
}

export default MyNoteList;
