require('@popperjs/core');
require('bootstrap');
require('../../vendor/bastinald/laravel-livewire-modals/resources/js/modals');

import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import persist from '@alpinejs/persist';
import trap from '@alpinejs/trap';
import collapse from '@alpinejs/collapse';
import clipboard from "@ryangjchandler/alpine-clipboard";

Alpine.plugin(clipboard);
Alpine.plugin(collapse);
Alpine.plugin(trap);
Alpine.plugin(persist);
Alpine.plugin(intersect);
window.Alpine = Alpine;

Alpine.start()
