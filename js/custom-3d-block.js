(function (blocks, element, editor, components) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = editor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;

  registerBlockType('custom-3d-block/block', {
      title: '3D File Viewer',
      icon: 'format-image',
      category: 'common',

      attributes: {
          modelURL: {
              type: 'string',
              default: ''
          }
      },

      edit: function (props) {
          var attributes = props.attributes;

          function onChangeModelURL(modelURL) {
              props.setAttributes({ modelURL: modelURL });
          }

          return el(
              'div',
              null,
              el(
                  InspectorControls,
                  null,
                  el(
                      PanelBody,
                      { title: '3D File Viewer Settings' },
                      el(TextControl, {
                          label: 'Model URL',
                          value: attributes.modelURL,
                          onChange: onChangeModelURL
                      })
                  )
              ),
              el(
                  'p',
                  null,
                  'Model URL: ' + attributes.modelURL
              )
          );
      },

      save: function (props) {
          var attributes = props.attributes;

          return el(
              'div',
              null,
              el(
                  'p',
                  null,
                  'Model URL: ' + attributes.modelURL
              )
          );
      }
  });
})(
  window.wp.blocks,
  window.wp.element,
  window.wp.editor,
  window.wp.components
);
