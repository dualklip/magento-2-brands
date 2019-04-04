#Magento 2 Brands Manager


![](https://img.shields.io/badge/release-1.2.1-green.svg) ![](https://img.shields.io/badge/status-dev-red.svg)


This is a Magento 2 module made to manage brands in two ways.
1. This offer you a new module in the control panel allowing to manage the brands with a view list where you can add, edit or delete the brands. This brands only have a title, description & logo.
2. A block can be added to your frontend view with a carousel integrated that show the brands logos.


##### How to add the block to your template
```html
<?xml version="1.0"?>
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="1column" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <body>
        <referenceContainer name="main.content" htmlTag="main" htmlClass="page-main-full-width" />
	    ...
	    <block class="PhoenixConnection\Brands\Block\Index" name="phoenix_connection_brands" template="PhoenixConnection_Brands::brands.phtml"/>
	    ...
	</body>
</page>
```

This Readme.md has been made with [Pandao MEditor](https://pandao.github.io/editor.md/index.html "Pandao MEditor")
