<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Products Dashboard UI</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<link rel="stylesheet" href="./style.css">
 <script>
        document.querySelector(".jsFilter").addEventListener("click", function () {
  document.querySelector(".filter-menu").classList.toggle("active");
});

document.querySelector(".grid").addEventListener("click", function () {
  document.querySelector(".list").classList.remove("active");
  document.querySelector(".grid").classList.add("active");
  document.querySelector(".products-area-wrapper").classList.add("gridView");
  document
    .querySelector(".products-area-wrapper")
    .classList.remove("tableView");
});

document.querySelector(".list").addEventListener("click", function () {
  document.querySelector(".list").classList.add("active");
  document.querySelector(".grid").classList.remove("active");
  document.querySelector(".products-area-wrapper").classList.remove("gridView");
  document.querySelector(".products-area-wrapper").classList.add("tableView");
});

var modeSwitch = document.querySelector('.mode-switch');
modeSwitch.addEventListener('click', function () {
  document.documentElement.classList.toggle('light');
 modeSwitch.classList.toggle('active');
});

  </script>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
* {
  box-sizing: border-box;
}

.light:root {
  --app-bg: #101827;
  --sidebar: rgba(21, 30, 47,1);
  --sidebar-main-color: #fff;
  --table-border: #1a2131;
  --table-header: #1a2131;
  --app-content-main-color: #fff;
  --sidebar-link: #fff;
  --sidebar-active-link: #1d283c;
  --sidebar-hover-link: #1a2539;
  --action-color: #2869ff;
  --action-color-hover: #6291fd;
  --app-content-secondary-color: #1d283c;
  --filter-reset: #2c394f;
  --filter-shadow: rgba(16, 24, 39, 0.8) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}

 :root {
  --app-bg: #fff;
  --sidebar: #f3f6fd;
  --app-content-secondary-color: #f3f6fd;
  --app-content-main-color: #1f1c2e;
  --sidebar-link: #1f1c2e;
  --sidebar-hover-link: rgba(195, 207, 244, 0.5);
  --sidebar-active-link: rgba(195, 207, 244, 1);
  --sidebar-main-color: #1f1c2e;
  --filter-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

body, html {
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
}

body {
  overflow: hidden;
  font-family: "Poppins", sans-serif;
  background-color: var(--app-bg);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.app-container {
  border-radius: 4px;
  width: 100%;
  height: 100%;
  max-height: 100%;
  max-width: 1280px;
  display: flex;
  overflow: hidden;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  max-width: 2000px;
  margin: 0 auto;
}

.sidebar {
  flex-basis: 200px;
  max-width: 200px;
  flex-shrink: 0;
  background-color: var(--sidebar);
  display: flex;
  flex-direction: column;
}
.sidebar-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px;
}
.sidebar-list {
  list-style-type: none;
  padding: 0;
}
.sidebar-list-item {
  position: relative;
  margin-bottom: 4px;
}
.sidebar-list-item a {
  display: flex;
  align-items: center;
  width: 100%;
  padding: 10px 16px;
  color: var(--sidebar-link);
  text-decoration: none;
  font-size: 14px;
  line-height: 24px;
}
.sidebar-list-item svg {
  margin-right: 8px;
}
.sidebar-list-item:hover {
  background-color: var(--sidebar-hover-link);
}
.sidebar-list-item.active {
  background-color: var(--sidebar-active-link);
}
.sidebar-list-item.active:before {
  content: "";
  position: absolute;
  right: 0;
  background-color: var(--action-color);
  height: 100%;
  width: 4px;
}
@media screen and (max-width: 1024px) {
  .sidebar {
    display: none;
  }
}

.mode-switch {
  background-color: transparent;
  border: none;
  padding: 0;
  color: var(--app-content-main-color);
  display: flex;
  justify-content: center;
  align-items: center;
  margin-left: auto;
  margin-right: 8px;
  cursor: pointer;
}
.mode-switch .moon {
  fill: var(--app-content-main-color);
}

.mode-switch.active .moon {
  fill: none;
}

.account-info {
  display: flex;
  align-items: center;
  padding: 16px;
  margin-top: auto;
}
.account-info-picture {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  overflow: hidden;
  flex-shrink: 0;
}
.account-info-picture img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
     object-fit: cover;
}
.account-info-name {
  font-size: 14px;
  color: var(--sidebar-main-color);
  margin: 0 8px;
  overflow: hidden;
  max-width: 100%;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.account-info-more {
  color: var(--sidebar-main-color);
  padding: 0;
  border: none;
  background-color: transparent;
  margin-left: auto;
}

.app-icon {
  color: var(--sidebar-main-color);
}
.app-icon svg {
  width: 24px;
  height: 24px;
}

.app-content {
  padding: 16px;
  background-color: var(--app-bg);
  height: 100%;
  flex: 1;
  max-height: 100%;
  display: flex;
  flex-direction: column;
}
.app-content-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 4px;
}
.app-content-headerText {
  color: var(--app-content-main-color);
  font-size: 24px;
  line-height: 32px;
  margin: 0;
}
.app-content-headerButton {
  background-color: var(--action-color);
  color:#2869ff;
  font-size: 14px;
  line-height: 24px;
  border: none;
  border-radius: 4px;
  height: 32px;
  padding: 0 16px;
  transition: 0.2s;
  cursor: pointer;
}
.app-content-headerButton:hover {
  background-color: var(--action-color-hover);
}
.app-content-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 16px 4px;
}
.app-content-actions-wrapper {
  display: flex;
  align-items: center;
  margin-left: auto;
}
@media screen and (max-width: 520px) {
  .app-content-actions {
    flex-direction: column;
  }
  .app-content-actions .search-bar {
    max-width: 100%;
    order: 2;
  }
  .app-content-actions .app-content-actions-wrapper {
    padding-bottom: 16px;
    order: 1;
  }
}

.search-bar {
  background-color: var(--app-content-secondary-color);
  border: 1px solid var(--app-content-secondary-color);
  color: var(--app-content-main-color);
  font-size: 14px;
  line-height: 24px;
  border-radius: 4px;
  padding: 0px 10px 0px 32px;
  height: 32px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
  background-size: 16px;
  background-repeat: no-repeat;
  background-position: left 10px center;
  width: 100%;
  max-width: 320px;
  transition: 0.2s;
}
.light .search-bar {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%231f1c2e' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
}
.search-bar:placeholder {
  color: var(--app-content-main-color);
}
.search-bar:hover {
  border-color: var(--action-color-hover);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236291fd' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
}
.search-bar:focus {
  outline: none;
  border-color: var(--action-color);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%232869ff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
}

.action-button {
  border-radius: 4px;
  height: 32px;
  background-color: var(--app-content-secondary-color);
  border: 1px solid var(--app-content-secondary-color);
  display: flex;
  align-items: center;
  color: var(--app-content-main-color);
  font-size: 14px;
  margin-left: 8px;
  cursor: pointer;
}
.action-button span {
  margin-right: 4px;
}
.action-button:hover {
  border-color: var(--action-color-hover);
}
.action-button:focus, .action-button.active {
  outline: none;
  color: var(--action-color);
  border-color: var(--action-color);
}

.filter-button-wrapper {
  position: relative;
}

.filter-menu {
  background-color: var(--app-content-secondary-color);
  position: absolute;
  top: calc(100% + 16px);
  right: -74px;
  border-radius: 4px;
  padding: 8px;
  width: 220px;
  z-index: 2;
  box-shadow: var(--filter-shadow);
  visibility: hidden;
  opacity: 0;
  transition: 0.2s;
}
.filter-menu:before {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid var(--app-content-secondary-color);
  bottom: 100%;
  left: 50%;
  transform: translatex(-50%);
}
.filter-menu.active {
  visibility: visible;
  opacity: 1;
  top: calc(100% + 8px);
}
.filter-menu label {
  display: block;
  font-size: 14px;
  color: var(--app-content-main-color);
  margin-bottom: 8px;
}
.filter-menu select {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  padding: 8px 24px 8px 8px;
  background-position: right 4px center;
  border: 1px solid var(--app-content-main-color);
  border-radius: 4px;
  color: var(--app-content-main-color);
  font-size: 12px;
  background-color: transparent;
  margin-bottom: 16px;
  width: 100%;
}
.filter-menu select option {
  font-size: 14px;
}
.light .filter-menu select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%231f1c2e' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
}
.filter-menu select:hover {
  border-color: var(--action-color-hover);
}
.filter-menu select:focus, .filter-menu select.active {
  outline: none;
  color: var(--action-color);
  border-color: var(--action-color);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%232869ff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
}

.filter-menu-buttons {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.filter-button {
  border-radius: 2px;
  font-size: 12px;
  padding: 4px 8px;
  cursor: pointer;
  border: none;
  color: #fff;
}
.filter-button.apply {
  background-color: var(--action-color);
}
.filter-button.reset {
  background-color: var(--filter-reset);
}

.products-area-wrapper {
  width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 0 4px;
}

.tableView .products-header {
  display: flex;
  align-items: center;
  border-radius: 4px;
  background-color: var(--app-content-secondary-color);
  position: sticky;
  top: 0;
}
.tableView .products-row {
  display: flex;
  align-items: center;
  border-radius: 4px;
}
.tableView .products-row:hover {
  box-shadow: var(--filter-shadow);
  background-color: var(--app-content-secondary-color);
}
.tableView .products-row .cell-more-button {
  display: none;
}
.tableView .product-cell {
  flex: 1;
  padding: 8px 16px;
  color: var(--app-content-main-color);
  font-size: 14px;
  display: flex;
  align-items: center;
}
.tableView .product-cell img {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  margin-right: 6px;
}
@media screen and (max-width: 780px) {
  .tableView .product-cell {
    font-size: 12px;
  }
  .tableView .product-cell.image span {
    display: none;
  }
  .tableView .product-cell.image {
    flex: 0.2;
  }
}
@media screen and (max-width: 520px) {
  .tableView .product-cell.category, .tableView .product-cell.sales {
    display: none;
  }
  .tableView .product-cell.status-cell {
    flex: 0.4;
  }
  .tableView .product-cell.stock, .tableView .product-cell.price {
    flex: 0.2;
  }
}
@media screen and (max-width: 480px) {
  .tableView .product-cell.stock {
    display: none;
  }
  .tableView .product-cell.price {
    flex: 0.4;
  }
}
.tableView .sort-button {
  padding: 0;
  background-color: transparent;
  border: none;
  cursor: pointer;
  color: var(--app-content-main-color);
  margin-left: 4px;
  display: flex;
  align-items: center;
}
.tableView .sort-button:hover {
  color: var(--action-color);
}
.tableView .sort-button svg {
  width: 12px;
}
.tableView .cell-label {
  display: none;
}

.status {
  border-radius: 4px;
  display: flex;
  align-items: center;
  padding: 4px 8px;
  font-size: 12px;
}
.status:before {
  content: "";
  width: 4px;
  height: 4px;
  border-radius: 50%;
  margin-right: 4px;
}
.status.active {
  color: #2ba972;
  background-color: rgba(43, 169, 114, 0.2);
}
.status.active:before {
  background-color: #2ba972;
}
.status.disabled {
  color: #59719d;
  background-color: rgba(89, 113, 157, 0.2);
}
.status.disabled:before {
  background-color: #59719d;
}

.gridView {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -8px;
}
@media screen and (max-width: 520px) {
  .gridView {
    margin: 0;
  }
}
.gridView .products-header {
  display: none;
}
.gridView .products-row {
  margin: 8px;
  width: calc(25% - 16px);
  background-color: var(--app-content-secondary-color);
  padding: 8px;
  border-radius: 4px;
  cursor: pointer;
  transition: transform 0.2s;
  position: relative;
}
.gridView .products-row:hover {
  transform: scale(1.01);
  box-shadow: var(--filter-shadow);
}
.gridView .products-row:hover .cell-more-button {
  display: flex;
}
@media screen and (max-width: 1024px) {
  .gridView .products-row {
    width: calc(33.3% - 16px);
  }
}
@media screen and (max-width: 820px) {
  .gridView .products-row {
    width: calc(50% - 16px);
  }
}
@media screen and (max-width: 520px) {
  .gridView .products-row {
    width: 100%;
    margin: 8px 0;
  }
  .gridView .products-row:hover {
    transform: none;
  }
}
.gridView .products-row .cell-more-button {
  border: none;
  padding: 0;
  border-radius: 4px;
  position: absolute;
  top: 16px;
  right: 16px;
  z-index: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 24px;
  height: 24px;
  background-color: rgba(16, 24, 39, 0.7);
  color: #fff;
  cursor: pointer;
  display: none;
}
.gridView .product-cell {
  color: var(--app-content-main-color);
  font-size: 14px;
  margin-bottom: 8px;
}
.gridView .product-cell:not(.image) {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 10px;
}
.gridView .product-cell.image span {
  font-size: 18px;
  line-height: 24px;
}
.gridView .product-cell img {
  width: 100%;
  height: 140px;
  -o-object-fit: cover;
     object-fit: cover;
  border-radius: 4px;
  margin-bottom: 16px;
}
.gridView .cell-label {
  opacity: 0.6;
}


</style>

</head>
<body>

<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="sidebar">
    <div class="sidebar-header">
        <div class="col-8 col-md-8 col-lg-4">
            <h1 class="mb-0"><a href="{{ route('properties.index') }}" class="text-dark h2 mb-0"><strong>Apart<span class="text-primary">.</span></strong></a></h1>
          </div>
    </div>
    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        <a href="{{ route('properties.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          <span>Home</span>
        </a>
      </li>
       <li class="sidebar-list-item">
        <a href="{{ route('user.dashboard',$user->id) }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
          <span>user profile</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="{{ route('user.booking', $user->id) }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>Booking</span>
        </a>
      </li>
      <li class="sidebar-list-item active">
        <a href="{{ route('user.reviews',$user->id) }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg>
          <span>Review</span>
        </a>
      </li>

    </ul>
    <div class="account-info">
     <div class="account-info-picture">
        <img src="{{ asset($user->image)}}">
      </div>
      <div class="account-info-name"><a href="{{ route('user.dashboard',$user->id) }}">{{ $user->name }}</a></div>
      <button class="account-info-more">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
      </button>
    </div>
  </div>
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Your Reviews</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
       </button>
    </div>

    <div class="app-content-actions">

      <div class="app-content-actions-wrapper">

        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <div id="eventContainer" class="products-area-wrapper tableView">
    <div class="container">
    <!-- Section: Your Reviews -->
    <h1 class="mt-4 mb-4">Your Reviews</h1>

    <!-- Check if there are reviews available -->
    @if(count($reviews) > 0)
        <div class="row">
            <!-- Loop through each review -->
            @foreach($reviews as $review)
                <div class="col-md-6">
                    <!-- Individual review card with custom styling -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <!-- Reviewer image (if available) -->
                                    {{-- Replace 'user_image_path' with the actual user image path --}}
                                    @if($user->image_path)
                                        <img src="{{ $user->image_path }}" class="img img-rounded img-fluid"/>
                                    @else
                                        <!-- Default image if user image is not available -->
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <!-- Review content -->
                                    <p>
                                        <a class="float-left" href="{{ $review->reviewer_profile_link }}"><strong>{{ $review->property->name }}</strong></a>
                                        <!-- Rating stars -->
                                        @for($i = 5; $i >= 1; $i--)
                                            @if($i <= $review->rating)
                                                <span class="float-right text-warning">&#9733;</span>
                                            @else
                                                <span class="float-right text-secondary">&#9734;</span>
                                            @endif
                                        @endfor
                                    </p>
                                    <div class="clearfix"></div>
                                    <!-- Review text -->
                                    <p>{{ $review->comment }}</p>
                                    <!-- Action buttons (Reply and Like) -->
                                    {{--  <p>
                                        <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                        <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                    </p>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Display message if no reviews are available -->
        <p>No reviews available.</p>
    @endif
</div>



  </div>
</div>
<!-- partial -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Ensure that Bootstrap JavaScript is loaded
    $(document).ready(function () {
        $('[data-toggle="modal"]').click(function () {
            var target = $(this).data('target');
            $(target).modal('show');
        });
    });
</script>


</body>
</html>
