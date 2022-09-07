 <style>
     table {
         margin: 20px auto;
         width: 1200px;
     }

     /* Zebra striping */
     tr:nth-of-type(odd) {

         background: #ffffff;
     }

     th {
         border-radius: 12px 0;
         background: #00a8e8;
         color: white;
         font-weight: bold;
     }

     td,
     th {
         padding: 10px;
         border: 1px solid #FAF3E3;
         font-size: 18px;
     }

     .container {
         padding-left: 0 !important;
         padding-right: 0 !important;
         margin: 0 !important;
         max-width: 1800px !important;
     }

     .navbar {
         margin: 0 30px !important;
     }

     p {
         font-size: 14px;
         line-height: 21px;
     }

     .card-container {
         background-color: #231e39;
         background-color: #461959;
         border-radius: 5px;
         box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
         color: #b3b8cd;
         padding-top: 30px;
         position: relative;
         width: 450px;
         max-width: 100%;
         text-align: center;
         left: 65%;
     }


     .card-container .pro {
         color: #231e39;
         background-color: #febb0b;
         border-radius: 3px;
         font-size: 14px;
         font-weight: bold;
         padding: 3px 7px;
         position: absolute;
         top: 30px;
         left: 30px;
     }

     .card-container .round {
         border: 1px solid #03bfcb;
         border-radius: 50%;
         padding: 7px;
     }

     button.primary {
         background-color: #03bfcb;
         border: 1px solid #03bfcb;
         border-radius: 3px;
         color: #231e39;
         font-family: Montserrat, sans-serif;
         font-weight: 500;
         padding: 10px 25px;
     }

     button.primary.ghost {
         background-color: transparent;
         color: #02899c;
     }

     .buttons {
         margin-bottom: 20px;
     }

     .skills {
         background-color: #1f1a36;
         text-align: left;
         padding: 15px;
     }


     .skills ul {
         list-style-type: none;
         margin: 0;
         padding: 0;
     }

     .skills ul li {
         border: 1px solid #2d2747;
         border-radius: 2px;
         display: inline-block;
         font-size: 12px;
         margin: 0 7px 7px 0;
         padding: 7px;
     }

     footer {
         background-color: #222;
         color: #fff;
         font-size: 14px;
         bottom: 0;
         position: fixed;
         left: 0;
         right: 0;
         text-align: center;
         z-index: 999;
     }

     footer p {
         margin: 10px 0;
     }

     footer i {
         color: red;
     }

     footer a {
         color: #3c97bf;
         text-decoration: none;
     }

     .alert {
         --bs-alert-bg: transparent;
         --bs-alert-padding-x: 1rem;
         --bs-alert-padding-y: 1rem;
         --bs-alert-margin-bottom: 1rem;
         --bs-alert-color: inherit;
         --bs-alert-border-color: transparent;
         --bs-alert-border: 1px solid var(--bs-alert-border-color);
         --bs-alert-border-radius: 0.375rem;
         position: relative;
         padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);
         margin-bottom: var(--bs-alert-margin-bottom);
         color: var(--bs-alert-color);
         background-color: var(--bs-alert-bg);
         border: var(--bs-alert-border);
         border-radius: var(--bs-alert-border-radius);
     }

     .alert-heading {
         color: inherit;
     }

     .alert-link {
         font-weight: 700;
     }

     .alert-dismissible {
         padding-right: 3rem;
     }

     .alert-dismissible .btn-close {
         position: absolute;
         top: 0;
         right: 0;
         z-index: 2;
         padding: 1.25rem 1rem;
     }

     .alert-primary {
         --bs-alert-color: #084298;
         --bs-alert-bg: #cfe2ff;
         --bs-alert-border-color: #b6d4fe;
     }

     .alert-primary .alert-link {
         color: #06357a;
     }

     .alert-secondary {
         --bs-alert-color: #41464b;
         --bs-alert-bg: #e2e3e5;
         --bs-alert-border-color: #d3d6d8;
     }

     .alert-secondary .alert-link {
         color: #34383c;
     }

     .alert-success {
         --bs-alert-color: #0f5132;
         --bs-alert-bg: #d1e7dd;
         --bs-alert-border-color: #badbcc;
     }

     .alert-success .alert-link {
         color: #0c4128;
     }

     .alert-info {
         --bs-alert-color: #055160;
         --bs-alert-bg: #cff4fc;
         --bs-alert-border-color: #b6effb;
     }

     .alert-info .alert-link {
         color: #04414d;
     }

     .alert-danger {
         --bs-alert-color: #842029;
         --bs-alert-bg: #f8d7da;
         --bs-alert-border-color: #f5c2c7;
     }

     .alert-danger .alert-link {
         color: #6a1a21;
     }

     .btn {
         --bs-btn-padding-x: 0.75rem;
         --bs-btn-padding-y: 0.375rem;
         --bs-btn-font-family: ;
         --bs-btn-font-size: 1rem;
         --bs-btn-font-weight: 400;
         --bs-btn-line-height: 1.5;
         --bs-btn-color: #212529;
         --bs-btn-bg: transparent;
         --bs-btn-border-width: 1px;
         --bs-btn-border-color: transparent;
         --bs-btn-border-radius: 0.375rem;
         --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15),
             0 1px 1px rgba(0, 0, 0, 0.075);
         --bs-btn-disabled-opacity: 0.65;
         --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), 0.5);
         display: inline-block;
         padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
         font-family: var(--bs-btn-font-family);
         font-size: var(--bs-btn-font-size);
         font-weight: var(--bs-btn-font-weight);
         line-height: var(--bs-btn-line-height);
         color: var(--bs-btn-color);
         text-align: center;
         text-decoration: none;
         vertical-align: middle;
         cursor: pointer;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
         border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
         border-radius: var(--bs-btn-border-radius);
         background-color: var(--bs-btn-bg);
         transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
             border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
     }

     .btn-primary {
         --bs-btn-color: #fff;
         --bs-btn-bg: #0d6efd;
         --bs-btn-border-color: #0d6efd;
         --bs-btn-hover-color: #fff;
         --bs-btn-hover-bg: #0b5ed7;
         --bs-btn-hover-border-color: #0a58ca;
         --bs-btn-focus-shadow-rgb: 49, 132, 253;
         --bs-btn-active-color: #fff;
         --bs-btn-active-bg: #0a58ca;
         --bs-btn-active-border-color: #0a53be;
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: #fff;
         --bs-btn-disabled-bg: #0d6efd;
         --bs-btn-disabled-border-color: #0d6efd;
     }

     .btn-secondary {
         --bs-btn-color: #fff;
         --bs-btn-bg: #6c757d;
         --bs-btn-border-color: #6c757d;
         --bs-btn-hover-color: #fff;
         --bs-btn-hover-bg: #5c636a;
         --bs-btn-hover-border-color: #565e64;
         --bs-btn-focus-shadow-rgb: 130, 138, 145;
         --bs-btn-active-color: #fff;
         --bs-btn-active-bg: #565e64;
         --bs-btn-active-border-color: #51585e;
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: #fff;
         --bs-btn-disabled-bg: #6c757d;
         --bs-btn-disabled-border-color: #6c757d;
     }

     .btn-success {
         --bs-btn-color: #fff;
         --bs-btn-bg: #198754;
         --bs-btn-border-color: #198754;
         --bs-btn-hover-color: #fff;
         --bs-btn-hover-bg: #157347;
         --bs-btn-hover-border-color: #146c43;
         --bs-btn-focus-shadow-rgb: 60, 153, 110;
         --bs-btn-active-color: #fff;
         --bs-btn-active-bg: #146c43;
         --bs-btn-active-border-color: #13653f;
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: #fff;
         --bs-btn-disabled-bg: #198754;
         --bs-btn-disabled-border-color: #198754;
     }

     .btn-info {
         --bs-btn-color: #000;
         --bs-btn-bg: #0dcaf0;
         --bs-btn-border-color: #0dcaf0;
         --bs-btn-hover-color: #000;
         --bs-btn-hover-bg: #31d2f2;
         --bs-btn-hover-border-color: #25cff2;
         --bs-btn-focus-shadow-rgb: 11, 172, 204;
         --bs-btn-active-color: #000;
         --bs-btn-active-bg: #3dd5f3;
         --bs-btn-active-border-color: #25cff2;
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: #000;
         --bs-btn-disabled-bg: #0dcaf0;
         --bs-btn-disabled-border-color: #0dcaf0;
     }

     .btn-warning {
         --bs-btn-color: #000;
         --bs-btn-bg: #ffc107;
         --bs-btn-border-color: #ffc107;
         --bs-btn-hover-color: #000;
         --bs-btn-hover-bg: #ffca2c;
         --bs-btn-hover-border-color: #ffc720;
         --bs-btn-focus-shadow-rgb: 217, 164, 6;
         --bs-btn-active-color: #000;
         --bs-btn-active-bg: #ffcd39;
         --bs-btn-active-border-color: #ffc720;
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: #000;
         --bs-btn-disabled-bg: #ffc107;
         --bs-btn-disabled-border-color: #ffc107;
     }

     .btn-danger {
         --bs-btn-color: #fff;
         --bs-btn-bg: #dc3545;
         --bs-btn-border-color: #dc3545;
         --bs-btn-hover-color: #fff;
         --bs-btn-hover-bg: #bb2d3b;
         --bs-btn-hover-border-color: #b02a37;
         --bs-btn-focus-shadow-rgb: 225, 83, 97;
         --bs-btn-active-color: #fff;
         --bs-btn-active-bg: #b02a37;
         --bs-btn-active-border-color: #a52834;
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: #fff;
         --bs-btn-disabled-bg: #dc3545;
         --bs-btn-disabled-border-color: #dc3545;
     }

     .btn-light {
         --bs-btn-color: #000;
         --bs-btn-bg: #f8f9fa;
         --bs-btn-border-color: #f8f9fa;
         --bs-btn-hover-color: #000;
         --bs-btn-hover-bg: #d3d4d5;
         --bs-btn-hover-border-color: #c6c7c8;
         --bs-btn-focus-shadow-rgb: 211, 212, 213;
         --bs-btn-active-color: #000;
         --bs-btn-active-bg: #c6c7c8;
         --bs-btn-active-border-color: #babbbc;
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: #000;
         --bs-btn-disabled-bg: #f8f9fa;
         --bs-btn-disabled-border-color: #f8f9fa;
     }

     @import url("https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap");

     /*  styling scrollbars  */
     ::-webkit-scrollbar {
         width: 5px;
         height: 6px;
     }

     ::-webkit-scrollbar-track {
         box-shadow: inset 0 0 5px #a5aaad;
         border-radius: 10px;
     }

     ::-webkit-scrollbar-thumb {
         background: #3ea175;
         border-radius: 10px;
     }

     ::-webkit-scrollbar-thumb:hover {
         background: #a5aaad;
     }

     * {
         margin: 0;
         padding: 0;
     }

     body {
         box-sizing: border-box;
         font-family: "Lato", sans-serif;
     }

     .text-primary-p:nth-child(odd) {
         color: #d3d6d8;
         font-size: 14px;
         font-weight: 700;
         font-weight: bold;
     }

     .font-bold {
         font-weight: 700;
     }

     .text-title {
         color: #111;
     }

     .text-title-2 {
         color: #fff;
     }

     .text-lightblue {
         color: #469cac;
     }

     .text-red {
         color: #cc3d38;
     }

     .text-yellow {
         color: #a98921;
     }

     .text-green {
         color: #3b9668;
     }

     .container {
         display: grid;
         height: 100vh;
         grid-template-columns: 0.8fr 1fr 1fr 1fr;
         grid-template-rows: 0.2fr 3fr;
         grid-template-areas:
             "sidebar nav nav nav"
             "sidebar main main main";
         /* grid-gap: 0.2rem; */
     }

     .navbar {
         background: #ffffff;
         grid-area: nav;
         height: 60px;
         display: flex;
         align-items: center;
         justify-content: space-between;
         padding: 0 30px 0 30px;
         border-bottom: 1px solid lightgray;
     }

     .nav_icon {
         display: none;
     }

     .nav_icon>i {
         font-size: 26px;
         color: #a5aaad;
     }

     .navbar__left>a {
         margin-right: 30px;
         text-decoration: none;
         color: #a5aaad;
         font-size: 15px;
         font-weight: 700;
     }

     .navbar__left .active_link {
         color: #265acc;
         border-bottom: 3px solid #265acc;
         padding-bottom: 12px;
     }

     .navbar__right {
         display: flex;
         justify-content: center;
         align-items: center;
     }

     .navbar__right>a {
         margin-left: 20px;
         text-decoration: none;
     }

     .navbar__right>a>i {
         color: #a5aaad;
         font-size: 16px;
         border-radius: 50px;
         background: #ffffff;
         box-shadow: 2px 2px 5px #d9d9d9, -2px -2px 5px #ffffff;
         padding: 7px;
     }

     main {
         background: #f3f4f6;
         grid-area: main;
         overflow-y: auto;
     }

     .main__container {
         padding: 20px 35px;
     }

     .main__title {
         display: flex;
         align-items: center;
     }

     .main__title>img {
         max-height: 100px;
         object-fit: contain;
         margin-right: 20px;
     }

     .main__greeting>h1 {
         font-size: 24px;
         color: #2e4a66;
         margin-bottom: 5px;
     }

     .main__greeting>p {
         font-size: 14px;
         font-weight: 700;
         color: #a5aaad;
     }

     .main__cards {
         display: grid;
         grid-template-columns: 1fr 1fr 1fr 1fr;
         gap: 30px;
         margin: 20px 0;
     }


     .card {
          height: 120px;
         width: 250px;
         padding: 25px;
         border-radius: 15px;
         background: linear-gradient(-45deg, #532422, #333533);
         margin: 3px auto;
        -webkit-transition: .5s;
         transition: .5s;
     }

     .card:hover {
         -webkit-transform: scale(1.1);
         transform: scale(1.1);
     }

     .card:nth-child(odd) {
         background-color: #6d6a75;
     }

     .card_inner {
         display: flex;
         align-items: center;
         justify-content: space-between;
     }

     .card_inner>span {
         font-size: 25px;
     }

     .charts {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 30px;
         margin-top: 50px;
     }

     .charts__left {
         padding: 25px;
         border-radius: 5px;
         background: #ffffff;
         box-shadow: 5px 5px 13px #ededed, -5px -5px 13px #ffffff;
     }

     .charts__left__title {
         display: flex;
         align-items: center;
         justify-content: space-between;
     }

     .charts__left__title>div>h1 {
         font-size: 24px;
         color: #2e4a66;
         margin-bottom: 5px;
     }

     .charts__left__title>div>p {
         font-size: 14px;
         font-weight: 700;
         color: #a5aaad;
     }

     .charts__left__title>i {
         color: #ffffff;
         font-size: 20px;
         background: #ffc100;
         border-radius: 200px 0px 200px 200px;
         -moz-border-radius: 200px 0px 200px 200px;
         -webkit-border-radius: 200px 0px 200px 200px;
         border: 0px solid #000000;
         padding: 15px;
     }

     .charts__right {
         padding: 25px;
         border-radius: 5px;
         background: #ffffff;
         box-shadow: 5px 5px 13px #ededed, -5px -5px 13px #ffffff;
     }

     .charts__right__title {
         display: flex;
         align-items: center;
         justify-content: space-between;
     }

     .charts__right__title>div>h1 {
         font-size: 24px;
         color: #2e4a66;
         margin-bottom: 5px;
     }

     .charts__right__title>div>p {
         font-size: 14px;
         font-weight: 700;
         color: #a5aaad;
     }

     .charts__right__title>i {
         color: #ffffff;
         font-size: 20px;
         background: #39447a;
         border-radius: 200px 0px 200px 200px;
         -moz-border-radius: 200px 0px 200px 200px;
         -webkit-border-radius: 200px 0px 200px 200px;
         border: 0px solid #000000;
         padding: 15px;
     }

     .charts__right__cards {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 20px;
         margin-top: 30px;
     }


     /*  SIDEBAR STARTS HERE  */

     #sidebar {
         background: #020509;
         grid-area: sidebar;
         overflow-y: auto;
         padding: 20px;
         -webkit-transition: all 0.5s;
         transition: all 0.5s;
     }

     .sidebar__title {
         display: flex;
         justify-content: space-between;
         align-items: center;
         color: #f3f4f6;
         margin-bottom: 30px;
         /* color: #E85B6B; */
     }

     .sidebar__img {
         display: flex;
         align-items: center;
     }

     .sidebar__title>div>img {
         width: 75px;
         object-fit: contain;
     }

     .sidebar__title>div>h1 {
         font-size: 18px;
         display: inline;
     }

     .sidebar__title>i {
         font-size: 18px;
         display: none;
     }

     .sidebar__menu>h2 {
         color: #3ea175;
         font-size: 16px;
         margin-top: 15px;
         margin-bottom: 5px;
         padding: 0 10px;
         font-weight: 700;
     }

     .sidebar__link {
         color: #f3f4f6;
         padding: 10px;
         border-radius: 3px;
         margin-bottom: 5px;
     }

     .active_menu_link {
         background: rgba(62, 161, 117, 0.3);
         color: #3ea175;
     }

     .active_menu_link a {
         color: #3ea175 !important;
     }

     .sidebar__link>a {
         text-decoration: none;
         color: #a5aaad;
         font-weight: 700;
     }

     .sidebar__link>i {
         margin-right: 10px;
         font-size: 18px;
     }

     .sidebar__logout {
         margin-top: 20px;
         padding: 10px;
         color: #e65061;
     }

     .sidebar__logout>a {
         text-decoration: none;
         color: #e65061;
         font-weight: 700;
         text-transform: uppercase;
     }

     .sidebar__logout>i {
         margin-right: 10px;
         font-size: 18px;
     }

     .sidebar_responsive {
         display: inline !important;
         z-index: 9999 !important;
         left: 0 !important;
         position: absolute;
     }

     @media only screen and (max-width: 978px) {
         .container {
             grid-template-columns: 1fr;
             /* grid-template-rows: 0.2fr 2.2fr; */
             grid-template-rows: 0.2fr 3fr;
             grid-template-areas:
                 "nav"
                 "main";
         }

         #sidebar {
             display: none;
         }

         .sidebar__title>i {
             display: inline;
         }

         .nav_icon {
             display: inline;
         }
     }

     @media only screen and (max-width: 855px) {
         .main__cards {
             grid-template-columns: 1fr;
             gap: 10px;
             margin-bottom: 0;
         }

         .charts {
             grid-template-columns: 1fr;
             margin-top: 30px;
         }
     }

     @media only screen and (max-width: 480px) {
         .navbar__left {
             display: none;
         }
     }
 </style>