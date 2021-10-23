module.exports = {
  multipass: false, // boolean. false by default
  plugins: [
    'cleanupAttrs',
    'mergeStyles',
    'inlineStyles',
    'removeDoctype',
    'removeXMLProcInst',
    'removeComments',
    'removeMetadata',
    'removeTitle',
    'removeDesc',
    'removeUselessDefs',
    'removeXMLNS',
    'removeEditorsNSData',
    'removeEmptyAttrs',
    'removeHiddenElems',
    'removeEmptyText',
    'removeEmptyContainers',
    // 'removeViewBox',
    'cleanupEnableBackground',
    'minifyStyles',
    // 'convertStyleToAttrs',
    'convertColors',
    'convertPathData',
    'convertTransform',
    'removeUnknownsAndDefaults',
    'removeNonInheritableGroupAttrs',
    'removeUselessStrokeAndFill',
    'removeUnusedNS',
    // 'prefixIds',
    'cleanupIDs',
    'cleanupNumericValues',
    // 'cleanupListOfValues',
    'moveElemsAttrsToGroup',
    'moveGroupAttrsToElems',
    'collapseGroups',
    // 'removeRasterImages',
    'mergePaths',
    'convertShapeToPath',
    'convertEllipseToCircle',
    'sortAttrs',
    'sortDefsChildren',
    'removeDimensions',
    // 'removeAttrs',
    {
      name: 'removeAttrs',
      params: {
        attrs: 'svg:id'
      }
    },
    // 'removeAttributesBySelector',
    // 'removeElementsByAttr',
    // 'addClassesToSVGElement',
    {
      name: 'addClassesToSVGElement',
      params: {
        className: '{{class-placeholder}}'
      }
    },
    // 'addAttributesToSVGElement',
    // 'removeOffCanvasPaths',
    'removeStyleElement',
    // 'removeScriptElement',
    // 'reusePaths',
  ]
}