/**
 /* Internal dependencies
 */
import {icons, iconColor} from '../../utils/icons.jsx'
import {findNextFreeID, removeElement} from '../../utils/helper.jsx'
import SC_Button from '../../components/scButtons/index.jsx'
import InfoLabel from '../../components/infoLabel/index.jsx'
import VisibleLabel from '../../components/visibleLabel/index.jsx'


/* WordPress dependencies
/*/

const {__} = wp.i18n
const {Fragment} = wp.element
const {RichText, PlainText, AlignmentToolbar, InspectorControls, BlockControls} = wp.blockEditor
const {PanelRow, PanelBody, SelectControl, TextControl} = wp.components
const {registerBlockType} = wp.blocks

/**
 /* Block constants
 */
const name = 'course'
const title = __('Course', 'structured-content')
const icon = {src: icons[name], foreground: iconColor}

const keywords = [
    __('course', 'structured-content'),
    __('structured-content', 'structured-content'),
]

const blockAttributes = {
    elements : {
        type   : 'array',
        default: [],
    },
    title_tag: {
        type   : 'string',
        default: 'h2'
    },
    css_class: {
        type   : 'string',
        default: ''
    },
    textAlign: {
        type: 'string',
    },
}

/**
 /* Register: aa Gutenberg Block.
 /*
 /* Registers a new block provided a unique name and an object defining its
 /* behavior. Once registered, the block is made editor as an option to any
 /* editor interface where blocks are implemented.
 /*
 /* @link https://wordpress.org/gutenberg/handbook/block-api/
 /* @param  {string}   name     Block name.
 /* @param  {Object}   settings Block settings.
 /* @return {?WPBlock}          The block, if it has been successfully
 /*                             registered otherwise `undefined`.
 */
registerBlockType(`structured-content/${name}`, {
    title   : title,
    icon    : icon,
    category: 'structured-content',
    keywords: keywords,

    attributes: blockAttributes,

    supports: {
        align          : ['wide', 'full'],
        stackedOnMobile: true,
    },

    /**
     /* The edit function describes the structure of your block in the context of the editor.
     /* This represents what the editor will render when the block is used.
     /*
     /* The "edit" property must be a valid function.
     /*
     /* @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     */
    edit: ({
               attributes,
               className,
               isSelected,
               setAttributes,
           }) => {

        const {
                  elements,
                  textAlign,
                  title_tag,
                  align,
                  css_class,
              } = attributes

        function addElement() {
            let id = findNextFreeID(elements)
            setAttributes({
                elements: [
                    ...elements,
                    {
                        id              : id,
                        title           : '',
                        description     : '',
                        provider_name   : '',
                        provider_same_as: '',
                        visible         : true,
                    }
                ]
            })
        }

        let elementsRender =
                elements
                    .sort(function (a, b) {
                        return a.index - b.index
                    }).map((data, index) => {
                    return <section
                        className={
                            className,
                            align && `align${align}`,
                            css_class ? css_class : `sc_card`
                        }
                        style={{textAlign: textAlign,}}
                        key={`course-${index}`}
                    >
                        <div className="sc_toggle-bar">
                            <div onClick={() => (setAttributes(elements[index] = {...elements[index], visible: !elements[index].visible}))}>
                                <VisibleLabel visible={data.visible}/>
                            </div>
                            <div onClick={() => setAttributes({elements: removeElement(data.id, elements)})}>
                                {icons.remove}
                            </div>
                        </div>
                        <div>
                            {wp.element.createElement(title_tag, {className: 'name'},
                                <PlainText
                                    placeholder={__('Enter Your Course Name here...', 'structured-content')}
                                    value={data.title}
                                    className='wp-block-structured-content-course__title'
                                    tag={title_tag}
                                    keepplaceholderonfocus="true"
                                    onChange={(value) => (setAttributes(
                                        elements[index] = {...elements[index], title: value}
                                    ))}
                                />
                            )}
                            <div className="description" itemProp="text">
                                <RichText
                                    placeholder={__('Enter your description here...', 'structured-content')}
                                    value={data.description}
                                    keepplaceholderonfocus="true"
                                    className='wp-block-structured-content-course__description'
                                    onChange={(value) => (setAttributes(
                                        elements[index] = {...elements[index], 'description': value}
                                    ))}
                                />
                            </div>
                            <div className="sc_grey-box" style={{marginTop: 15}}>
                                <div className="sc_box-label">
                                    {__('Provider Information', 'structured-content')}
                                </div>
                                <div className="sc_row">
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Provider Name', 'structured-content')}
                                        </div>
                                        <TextControl
                                            type="text"
                                            value={data.provider_name}
                                            placeholder={__('Provider Name', 'structured-content')}
                                            className="wp-block-structured-content-course__provider_name"
                                            onChange={(value) => (setAttributes(
                                                elements[index] = {
                                                    ...elements[index], provider_name: value
                                                }
                                            ))}
                                        />
                                    </div>
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Same as (Website / Social Media)', 'structured-content')}
                                        </div>
                                        <TextControl
                                            type="url"
                                            value={data.provider_same_as}
                                            placeholder={__('https://your-website.com', 'structured-content')}
                                            className="wp-block-structured-content-course__same_as"
                                            onChange={(value) => (setAttributes(
                                                elements[index] = {
                                                    ...elements[index], provider_same_as: value
                                                }
                                            ))}
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                })

        if (elements.length === 0) {
            addElement()
        }

        return [
            <Fragment>
                {isSelected && (
                    <Fragment>
                        <BlockControls>
                            <AlignmentToolbar
                                value={textAlign}
                                onChange={(nextTextAlign) => setAttributes({textAlign: nextTextAlign})}
                            />
                        </BlockControls>
                    </Fragment>
                )}
                {isSelected && (
                    <Fragment>
                        <InspectorControls>
                            <PanelBody>
                                <PanelRow>
                                    <SelectControl
                                        label={__('Title tag', 'structured-content')}
                                        value={title_tag}
                                        className="w-100"
                                        options={[
                                            {label: 'H2', value: 'h2'},
                                            {label: 'H3', value: 'h3'},
                                            {label: 'H4', value: 'h4'},
                                            {label: 'H5', value: 'h5'},
                                            {label: 'p', value: 'p'},
                                        ]}
                                        onChange={(title_tag) => {
                                            setAttributes({title_tag: title_tag})
                                        }}
                                    />
                                </PanelRow>
                                <PanelRow>
                                    <TextControl
                                        label={__('CSS class', 'structured-content')}
                                        className="w-100"
                                        value={css_class}
                                        placeholder={__('additional css classes ...', 'structured-content')}
                                        onChange={(css_class) => setAttributes({css_class: css_class})}
                                    />
                                </PanelRow>
                            </PanelBody>
                        </InspectorControls>
                    </Fragment>
                )}
                <div className="sc_multi-wrapper">
                    <div className="sc_toggle-bar single">
                        <InfoLabel url="https://developers.google.com/search/docs/data-types/course"/>
                    </div>
                    <div>{elementsRender}</div>
                    <SC_Button action={addElement} icon={true}>
                        {__('Add One', 'structured-content')}
                    </SC_Button>
                </div>
            </Fragment>
        ]
    },

    /**
     /* The save function defines the way in which the different attributes should be combined
     /* into the final markup, which is then serialized by Gutenberg into post_content.
     /*
     /* The "save" property must be specified and must be a valid function.
     /*
     /* @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     */
    save: function () {
        return null
    },
})
