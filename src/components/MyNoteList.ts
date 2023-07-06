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
    console.log(`update item ${id}`);
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
