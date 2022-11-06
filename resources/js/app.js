require('./bootstrap');

require('alpinejs');

import Choices from 'choices.js';

// Create mutiselect element
window.choices = (element) => {
    return new Choices(element, {
        maxItemCount: 3, 
        removeItemButton: true,
    });
}
