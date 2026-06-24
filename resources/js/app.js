import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css";
import "flatpickr/dist/plugins/monthSelect/style.css";
import monthSelectPlugin from "flatpickr/dist/plugins/monthSelect";
import { th } from "flatpickr/dist/l10n/th.js";

Alpine.start();

window.flatpickr = flatpickr;
window.monthSelectPlugin = monthSelectPlugin;
window.th = th;
