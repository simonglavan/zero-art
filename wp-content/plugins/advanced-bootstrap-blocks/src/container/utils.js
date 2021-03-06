const { 
  createHigherOrderComponent 
} = wp.compose;

const { 
  getBlockDefaultClassName 
} = wp.blocks;

const defaultClassName = getBlockDefaultClassName("advanced-bootstrap-blocks/container");

export const setBlockCustomClassName = ( blockName ) => {
	return blockName === defaultClassName ?
    [] :
		blockName;
}

export const setBlockAttributes = ( attributes ) => {
  if (typeof attributes.className !== "undefined")
    attributes.className = attributes.className.replace(`${defaultClassName} `, "");
	return attributes;
}

export const modifyBlockListBlockContainer = createHigherOrderComponent( ( BlockListBlock ) => {
  return ( props ) => {
    if (props.block.name == "advanced-bootstrap-blocks/container") {
      const isDropTarget = typeof props.className !== "undefined" ? !props.className.indexOf('is-drop-target') : false; 
      return (
        <BlockListBlock 
          { ...props } 
          className={ props.attributes.isWrapped ? props.attributes.className : isDropTarget ? "is-drop-target" : null }
        />
      );
    }
    return <BlockListBlock { ...props } />;
  }; 
}, 'modifyBlockListBlockContainer' );

export const modifyGetSaveElementContainer = (element, blockType, attributes ) => {
  if (!element) {
    return;
  }
  if (blockType.name === 'advanced-bootstrap-blocks/container') {
    if (attributes.isWrapped) {
      return (
        <div 
          {...attributes.anchor ? { id: attributes.anchor } : { } }
          className={element.props.className}
          { // conditionally render style attribute with backgroundImage property
            ...attributes.backgroundImage.hasOwnProperty("full") ? {
              style: {
                backgroundImage: `url(${attributes.backgroundImage.full.url})`,
                ...attributes.backgroundSize ? { backgroundSize: `${attributes.backgroundSize}` } : { },
                ...attributes.backgroundRepeat ? { backgroundRepeat: `${attributes.backgroundRepeat}` } : { },
                ...attributes.backgroundPosition ? attributes.backgroundPosition.hasOwnProperty("x") ? { backgroundPosition: `${ Math.round(attributes.backgroundPosition.x * 100) }% ${ Math.round(attributes.backgroundPosition.y * 100) }%` } : { } : { },
                ...attributes.backgroundAttachment ? { backgroundAttachment: `${attributes.backgroundAttachment}` } : { },
              }
            } : null
          }
        >
          <div className={ attributes.isFluid ? "container-fluid" : "container" }>
            {element}
          </div>
        </div>
      )
    }
    return (
      <div 
        {...attributes.anchor ? { id: attributes.anchor } : { } }
        className={ [(attributes.isFluid ? "container-fluid" : "container"), element.props.className].join(" ").trim() }
        { // conditionally render style attribute with backgroundImage property
          ...attributes.backgroundImage.hasOwnProperty("full") ? {
            style: {
              backgroundImage: `url(${attributes.backgroundImage.full.url})`,
              ...attributes.backgroundSize ? { backgroundSize: `${attributes.backgroundSize}` } : null,
              ...attributes.backgroundRepeat ? { backgroundRepeat: `${attributes.backgroundRepeat}` } : null,
              ...attributes.backgroundPosition ? attributes.backgroundPosition.hasOwnProperty("x") ? { backgroundPosition: `${ Math.round(attributes.backgroundPosition.x * 100) }% ${ Math.round(attributes.backgroundPosition.y * 100) }%` } : null : null,
              ...attributes.backgroundAttachment ? { backgroundAttachment: `${attributes.backgroundAttachment}` } : null,
            }
          } : null
        }
      >
        {element}
      </div>
    )
  }
  return element;
}