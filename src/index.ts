import HeroSlider from "./components/HeroSlider";
import MyNoteDialog from "./components/MyNoteDialog";
import MyNoteList from "./components/MyNoteList";
import NavbarTopMobile from "./components/NavbarTopMobile";
import SearchDialog from "./components/SearchDialog";

const heroSlider = new HeroSlider();
heroSlider.enable();

const myNoteDialog = new MyNoteDialog();
myNoteDialog.enable();

const myNoteList = new MyNoteList();
myNoteList.enable();

const navbarTopMobile = new NavbarTopMobile();
navbarTopMobile.enable();

const searchDialog = new SearchDialog();
searchDialog.enable();
