# ResoBit Checkout & Reorder Magento 2 Extension

## Overview

The ResoBit Checkout & Reorder extension improves the Magento 2 checkout experience by enabling enhancements for faster transactions. It also allows customers to reorder a previous purchase directly from their order history, simplifying repeat purchases and improving user convenience.

---

## Features

- Enhanced checkout process ready for further UI improvements.
- "Reorder This Purchase" button on order detail pages.
- Adds all visible items from previous orders to the cart with a single click.
- Follows Magento 2 best practices with modular, extensible architecture.
- Compatible with Magento 2.4.x and PHP 7.4 / 8.x.

---

## Installation

1. Place the module under `app/code/ResoBit/CheckoutEnhancements`.

2. Run the following commands from the Magento root directory:

```bash

php bin/magento module:enable ResoBit_CheckoutEnhancements
php bin/magento setup:upgrade
php bin/magento cache:flush

```

---

## Usage

- Customers can reorder their previous purchases by viewing their order details and clicking the "Reorder This Purchase" button.
- Checkout enhancements are loaded automatically on the checkout page for added UX improvements (expandable with custom JS).

---

## Extensibility

- The module's checkout enhancements use RequireJS to allow easy integration of future UI/UX improvements.
- Developers can extend or customize the reorder logic and UI by overriding blocks, templates, and controllers.
- Easily integrate additional checkout steps, validations, or custom messages.

---

## Support and Contribution

For feature requests, bugs or questions, please open an issue on the GitHub repository.

---

## License

This module is licensed under the Open Software License (OSL 3.0).

---

## Author

ResoBit - Magento 2 Extension Developer

---

Thank you for choosing ResoBit extensions to improve your Magento 2 store!
