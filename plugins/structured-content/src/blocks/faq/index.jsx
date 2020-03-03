/**
 /* Internal dependencies
 */
import {icons, iconColor} from '../../utils/icons.jsx'
import SC_Button from '../../components/scButtons/index.jsx'
import InfoLabel from '../../components/infoLabel/index.jsx'
import VisibleLabel from '../../components/visibleLabel/index.jsx'
import {findNextFreeID, removeElement} from '../../utils/helper.jsx'

/**
 /* WordPress dependencies
 */

const {__} = wp.i18n // Import __() from wp.i18n
const {Fragment} = wp.element
const {RichText, PlainText, AlignmentToolbar, MediaUpload, InspectorControls, BlockControls} = wp.blockEditor
const {PanelRow, PanelBody, SelectControl, TextControl} = wp.components
const {registerBlockType} = wp.blocks

/* Block constants
*/
const name = 'faq'
const title = __('FAQ', 'structured-content')
const icon = {src: icons[name], foreground: iconColor}

const keywords = [
    __('faq question', 'structured-content'),
    __('faq answer', 'structured-content'),
    __('structured-content', 'structured-content'),
]

const blockAttributes = {
    elements    : {
        type   : 'array',
        default: [],
    },
    question_tag: {
        type   : 'string',
        default: 'h2'
    },
    css_class   : {
        type   : 'string',
        default: ''
    },
    textAlign   : {
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
               align,
               isSelected,
               setAttributes,
           }) => {

        const {
                  elements,
                  textAlign,
                  question_tag,
                  css_class,
              } = attributes

        function onImageSelect(imageObject, index) {
            setAttributes(
                elements[index] = {
                    ...elements[index],
                    imageID          : imageObject.id,
                    imageAlt         : imageObject.alt,
                    thumbnailImageUrl: imageObject.sizes.thumbnail.url,
                }
            )
        }

        function onRemoveImage(index) {
            setAttributes(
                elements[index] = {
                    ...elements[index],
                    imageID          : '',
                    imageAlt         : '',
                    thumbnailImageUrl: '',
                }
            )
        }

        function addQuestion() {
            let id = findNextFreeID(elements)
            setAttributes({
                elements: [
                    ...elements,
                    {
                        id               : id,
                        question         : '',
                        answer           : '',
                        imageID          : '',
                        imageAlt         : '',
                        thumbnailImageUrl: '',
                        visible          : true,
                    }
                ]
            })
        }

        let questionRender =
                elements
                    .sort(function (a, b) {
                        return a.index - b.index
                    }).map((data, index) => {
                    return (
                        <section
                            className={
                                className,
                                align && `align${align}`,
                                css_class ? css_class : `sc_card`
                            }
                            style={
                                {
                                    textAlign: textAlign,
                                    margin   : '15px auto 0'
                                }
                            }
                            key={`faq-${index}`}
                        >
                            <div className="sc_toggle-bar">
                                <div onClick={() => (setAttributes(elements[index] = {...elements[index], visible: !elements[index].visible}))} style={{float: 'left'}}>
                                    <VisibleLabel visible={data.visible}/>
                                </div>
                                <div onClick={() => setAttributes({elements: removeElement(data.id, elements)})}>
                                    {icons.remove}
                                </div>
                            </div>
                            <div>
                                {wp.element.createElement(question_tag, {className: 'question'},
                                    <PlainText
                                        placeholder={__('Enter Your Question here...', 'structured-content')}
                                        value={data.question}
                                        className='wp-block-structured-content-faq__title question'
                                        tag={question_tag}
                                        onChange={(value) => (setAttributes(
                                            elements[index] = {...elements[index], 'question': value}
                                        ))}
                                        keepplaceholderonfocus="true"
                                    />
                                )}
                                <div>
                                    {!data.thumbnailImageUrl ?
                                        <MediaUpload
                                            onSelect={(media) => onImageSelect(media, index)}
                                            type="image"
                                            value={data.imageID}
                                            render={({open}) => (
                                                <SC_Button action={open} className="inline">
                                                    {__('Add Image', 'structured-content')}
                                                </SC_Button>
                                            )}
                                        />
                                        :
                                        <figure style={{position: 'relative'}}>
                                            <a href="#" title={data.imageAlt}>
                                                <img itemProp="image" src={data.thumbnailImageUrl} alt={data.imageAlt} style={{marginRight: '-1em', marginTop: 0}}/>
                                            </a>
                                            <SC_Button action={onRemoveImage.bind(this, index)} className="delete no-margin-top">
                                                {icons.close}
                                            </SC_Button>
                                        </figure>
                                    }
                                    <div className="answer" itemProp="text">
                                        <RichText
                                            placeholder={__('Enter your answer here...', 'structured-content')}
                                            value={data.answer}
                                            keepplaceholderonfocus="true"
                                            className='wp-block-structured-content-faq__text'
                                            onChange={(value) => (setAttributes(
                                                elements[index] = {...elements[index], 'answer': value}
                                            ))}
                                        />
                                    </div>
                                </div>
                            </div>
                        </section>
                    )
                })

        if (elements.length === 0) {
            addQuestion()
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
                                        value={question_tag}
                                        className="w-100"
                                        options={[
                                            {label: 'H2', value: 'h2'},
                                            {label: 'H3', value: 'h3'},
                                            {label: 'H4', value: 'h4'},
                                            {label: 'H5', value: 'h5'},
                                            {label: 'p', value: 'p'},
                                        ]}
                                        onChange={(question_tag) => {
                                            setAttributes({question_tag: question_tag})
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
                        <InfoLabel url="https://developers.google.com/search/docs/data-types/faqpage"/>
                    </div>
                    <div>{questionRender}
                    </div>
                    <SC_Button action={addQuestion} icon={true}>
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
    save: function (props) {
        return null
    },
})