/**
 /* Internal dependencies
 */
import {icons, iconColor} from '../../utils/icons.jsx'
import {escapeQuotes, findNextFreeID, removeElement} from '../../utils/helper.jsx'
import SC_Button from '../../components/scButtons/index.jsx'
import InfoLabel from '../../components/infoLabel/index.jsx'
import VisibleLabel from '../../components/visibleLabel/index.jsx'
import _ from 'lodash'

/**
 /* WordPress dependencies
 */

const {__} = wp.i18n // Import __() from wp.i18n
const {Fragment} = wp.element
const {RichText, PlainText, AlignmentToolbar, MediaUpload, InspectorControls, BlockControls} = wp.blockEditor
const {PanelRow, PanelBody, SelectControl, TextControl, TimePicker} = wp.components
const {registerBlockType} = wp.blocks
const {__experimentalGetSettings} = wp.date

/* Block constants
*/
const name = 'event'
const title = __('Event', 'structured-content')
const icon = {src: icons[name], foreground: iconColor}

const keywords = [
    __('event', 'structured-content'),
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
                  align,
                  textAlign,
                  title_tag,
                  css_class,
                  visible,
              } = attributes

        const settings = __experimentalGetSettings()

        // To know if the current timezone is a 12 hour time with look for an "a" in the time format.
        // We also make sure this a is not escaped by a "/".
        const is12HourTime = /a(?!\\)/i.test(
            settings.formats.time
                    .toLowerCase() // Test only the lower case a
                    .replace(/\\\\/g, '') // Replace "//" with empty strings
                    .split('').reverse().join('') // Reverse the string and test for "a" not followed by a slash
        )

        function onImageSelect(imageObject, index) {
            setAttributes(
                elements[index] = {
                    ...elements[index],
                    image_id     : imageObject.id,
                    image_alt    : imageObject.alt,
                    thumbnail_url: imageObject.sizes.thumbnail.url,
                }
            )
        }

        function onRemoveImage(index) {
            setAttributes(
                elements[index] = {
                    ...elements[index],
                    image_id     : '',
                    image_alt    : '',
                    thumbnail_url: '',
                }
            )
        }


        function addEvent() {
            let id = findNextFreeID(elements)
            setAttributes({
                elements: [
                    ...elements,
                    {
                        id                : id,
                        title             : '',
                        description       : '',
                        event_location    : '',
                        start_date        : '',
                        end_date          : '',
                        street_address    : '',
                        address_locality  : '',
                        address_region    : '',
                        address_country   : '',
                        postal_code       : '',
                        imageID           : '',
                        imageAlt          : '',
                        thumbnailImageUrl : '',
                        currency_code     : '',
                        price             : '',
                        performer         : '',
                        performer_name    : '',
                        offer_url         : '',
                        offer_availability: '',
                        offer_valid_from  : '',
                        visible           : true,
                    }
                ]
            })
        }

        const performerOptions = [
            {label: __('Select a Type', 'structured-content'), value: null},
            {label: __('Performing Group', 'structured-content'), value: 'PerformingGroup'},
            {label: __('Person', 'structured-content'), value: 'Person'},
        ];

        const AvailabilityOptions = [
            {label: __('Select a Type', 'structured-content'), value: null},
            {label: __('In Stock', 'structured-content'), value: 'InStock'},
            {label: __('Sold Out', 'structured-content'), value: 'SoldOut'},
            {label: __('Pre Order', 'structured-content'), value: 'PreOrder'}
        ];

        let eventRender =
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
                            style={{
                                textAlign: textAlign,
                                margin   : '15px auto 0'
                            }}
                            key={`event-${index}`}
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
                                {wp.element.createElement(title_tag, {class: 'title'},
                                    <PlainText
                                        placeholder={__('Enter Your Event Title...', 'structured-content')}
                                        value={data.title}
                                        className='wp-block-structured-content-event__title title'
                                        tag={title_tag}
                                        onChange={
                                            (value) => (setAttributes(
                                                elements[index] = {...elements[index], title: value}
                                            ))}
                                        keepplaceholderonfocus="true"
                                    />
                                )}
                                {!data.thumbnail_url ?
                                    <MediaUpload
                                        onSelect={(media) => onImageSelect(media, index)}
                                        type="image"
                                        value={data.image_id}
                                        render={({open}) => (
                                            <SC_Button action={open} className="inline">
                                                {__('Add Image', 'structured-content')}
                                            </SC_Button>
                                        )}
                                    />
                                    :
                                    <figure style={{position: 'relative'}}>
                                        <a href="#" title={data.image_alt}>
                                            <img itemProp="image" src={data.thumbnail_url} alt={data.image_alt} style={{marginRight: '-1em', marginTop: 0}}/>
                                        </a>
                                        <SC_Button action={onRemoveImage.bind(this, index)} className="delete no-margin-top">
                                            {icons.close}
                                        </SC_Button>
                                    </figure>
                                }
                                <div className="description" itemProp="text">
                                    <RichText
                                        placeholder={__('Enter your event description here...', 'structured-content')}
                                        value={data.description}
                                        className='wp-block-structured-content-event__text'
                                        onChange={(value) => (setAttributes(
                                            elements[index] = {...elements[index], description: value}
                                        ))}
                                        keepplaceholderonfocus="true"
                                    />
                                </div>
                                <div className="sc_row w-100" style={{marginTop: 15}}>
                                    <div className="sc_grey-box">
                                        <div className="sc_box-label">
                                            {__('Event Meta', 'structured-content')}
                                        </div>
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Name', 'structured-content')}
                                            </div>
                                            <TextControl
                                                placeholder={__('Event Location Name', 'structured-content')}
                                                value={data.event_location}
                                                type="text"
                                                className='wp-block-structured-content-event__location'
                                                onChange={(value) => (setAttributes(
                                                    elements[index] = {...elements[index], event_location: value}
                                                ))}
                                            />
                                        </div>

                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Start Date', 'structured-content')}
                                            </div>

                                            <TimePicker
                                                currentTime={data.start_date}
                                                onChange={(value) => (setAttributes(
                                                    elements[index] = {...elements[index], start_date: value}
                                                ))}
                                                is12Hour={is12HourTime}
                                            />
                                        </div>
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('End Date', 'structured-content')}
                                            </div>
                                            <TimePicker
                                                currentTime={data.end_date}
                                                onChange={(value) => (setAttributes(
                                                    elements[index] = {...elements[index], end_date: value}
                                                ))}
                                                is12Hour={is12HourTime}
                                            />
                                        </div>
                                    </div>
                                    <div className="sc_grey-box">
                                        <div className="sc_box-label">
                                            {__('Event Location', 'structured-content')}
                                        </div>
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Street', 'structured-content')}
                                            </div>
                                            <TextControl
                                                placeholder={__('Any Street 3A', 'structured-content')}
                                                type="text"
                                                value={data.street_address}
                                                className="wp-block-structured-content-job__street_address"
                                                onChange={(value) => (setAttributes(
                                                    elements[index] = {...elements[index], street_address: value}
                                                ))}
                                            />
                                        </div>
                                        <div className="sc_row">
                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Postal Code', 'structured-content')}
                                                </div>
                                                <TextControl
                                                    placeholder={__('Any Postal Code', 'structured-content')}
                                                    type="text"
                                                    value={data.postal_code}
                                                    className="wp-block-structured-content-job__postal_code"
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], postal_code: value}
                                                    ))}
                                                />
                                            </div>
                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Locality', 'structured-content')}
                                                </div>
                                                <TextControl
                                                    placeholder={__('Any City', 'structured-content')}
                                                    type="text"
                                                    value={data.address_locality}
                                                    className="wp-block-structured-content-job__address_locality"
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], address_locality: value}
                                                    ))}
                                                />
                                            </div>
                                        </div>
                                        <div className="sc_row">
                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Country ISO Code', 'structured-content')}
                                                </div>
                                                <TextControl
                                                    placeholder={__('US', 'structured-content')}
                                                    type="text"
                                                    value={data.address_country}
                                                    className="wp-block-structured-content-job__address_country"
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], address_country: value}
                                                    ))}
                                                />
                                            </div>
                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Region ISO Code', 'structured-content')}
                                                </div>
                                                <TextControl
                                                    placeholder={__('CA', 'structured-content')}
                                                    type="text"
                                                    value={data.address_region}
                                                    className="wp-block-structured-content-job__address_region"
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], address_region: value}
                                                    ))}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="sc_row w-100">
                                    <div className="sc_grey-box">
                                        <div className="sc_box-label">
                                            {__('Performer', 'structured-content')}
                                        </div>
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Type', 'structured-content')}
                                            </div>
                                            <SelectControl
                                                value={data.performer}
                                                className="w-100"
                                                options={performerOptions}
                                                onChange={(value) => (setAttributes(
                                                    elements[index] = {...elements[index], performer: value}
                                                ))}
                                            />
                                        </div>

                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Name', 'structured-content')}
                                            </div>
                                            <TextControl
                                                placeholder={__('John Doe', 'structured-content')}
                                                type="text"
                                                value={data.performer_name}
                                                onChange={(value) => (setAttributes(
                                                    elements[index] = {...elements[index], performer_name: value}
                                                ))}
                                            />
                                        </div>
                                    </div>
                                    <div className="sc_grey-box">
                                        <div className="sc_box-label">
                                            {__('Offer', 'structured-content')}
                                        </div>
                                        <div className="sc_row">
                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Availability', 'structured-content')}
                                                </div>
                                                <SelectControl
                                                    value={data.offer_availability}
                                                    className="w-100"
                                                    options={AvailabilityOptions}
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], offer_availability: value}
                                                    ))}
                                                />
                                            </div>

                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Ticket Website', 'structured-content')}
                                                </div>
                                                <TextControl
                                                    placeholder={__('https://your-website.com', 'structured-content')}
                                                    type="url"
                                                    value={data.offer_url}
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], offer_url: value}
                                                    ))}
                                                />
                                            </div>
                                        </div>
                                        <div className="sc_row">
                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Currency ISO Code', 'structured-content')}
                                                </div>
                                                <TextControl
                                                    placeholder={__('USD', 'structured-content')}
                                                    value={data.currency_code}
                                                    type="text"
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], currency_code: value}
                                                    ))}
                                                />
                                            </div>
                                            <div className="sc_input-group">
                                                <div className="sc_input-label">
                                                    {__('Price', 'structured-content')}
                                                </div>
                                                <TextControl
                                                    placeholder="40"
                                                    type="number"
                                                    value={data.price}
                                                    onChange={(value) => (setAttributes(
                                                        elements[index] = {...elements[index], price: value}
                                                    ))}
                                                />
                                            </div>
                                        </div>
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Valid From', 'structured-content')}
                                            </div>
                                            <TimePicker
                                                currentTime={data.offer_valid_from}
                                                onChange={(value) => (setAttributes(
                                                    elements[index] = {...elements[index], offer_valid_from: value}
                                                ))}
                                                is12Hour={is12HourTime}
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    )
                })

        if (elements.length === 0) {
            addEvent()
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
                        <InfoLabel url="https://developers.google.com/search/docs/data-types/event"/>
                    </div>
                    <div>{eventRender}</div>
                    <SC_Button action={addEvent} icon={true}>
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

    deprecated: [
        {
            attributes: {
                title           : {
                    type    : 'string',
                    selector: '.wp-block-structured-content-event__title',
                },
                description     : {
                    type    : 'string',
                    selector: '.wp-block-structured-content-event__description',
                    default : '',
                },
                event_location  : {
                    type    : 'string',
                    selector: '.wp-block-structured-content-event__location',
                },
                start_date      : {
                    type   : 'string',
                    default: '',
                },
                end_date        : {
                    type   : 'string',
                    default: '',
                },
                street_address  : {
                    type    : 'string',
                    selector: '.wp-block-structured-content-job__street_address',
                    default : '',
                },
                address_locality: {
                    type    : 'string',
                    selector: '.wp-block-structured-content-job__address_locality',
                    default : '',
                },
                postal_code     : {
                    type    : 'string',
                    selector: '.wp-block-structured-content-job__postal_code',
                    default : '',
                },
                address_region  : {
                    type    : 'string',
                    selector: '.wp-block-structured-content-job__address_region',
                    default : '',
                },
                address_country : {
                    type    : 'string',
                    selector: '.wp-block-structured-content-job__address_country',
                    default : '',
                },
                image_id        : {
                    type   : 'number',
                    default: ''
                },
                image_alt       : {
                    type   : 'string',
                    default: ''
                },
                thumbnail_url   : {
                    type   : 'string',
                    default: ''
                },
                currency_code   : {
                    type   : 'string',
                    default: '',
                },
                price           : {
                    type   : 'string',
                    default: '',
                },
                html            : {
                    type   : 'bool',
                    default: true,
                },
                ...blockAttributes
            },

            isEligible(attributes) {
                return typeof attributes.elements == 'undefined'
            },

            migrate: function (attributes) {
                console.debug('migrated event')
                return {
                    ...attributes,
                    elements: [
                        {
                            id               : 0,
                            title            : attributes.title,
                            description      : attributes.description,
                            event_location   : attributes.event_location,
                            start_date       : attributes.start_date,
                            end_date         : attributes.end_date,
                            street_address   : attributes.street_address,
                            address_locality : attributes.address_locality,
                            address_region   : attributes.address_region,
                            address_country  : attributes.address_country,
                            postal_code      : attributes.postal_code,
                            imageID          : attributes.imageID,
                            imageAlt         : attributes.imageAlt,
                            thumbnailImageUrl: attributes.thumbnailImageUrl,
                            currency_code    : attributes.currency_code,
                            price            : attributes.price,
                            visible          : attributes.html,
                        }
                    ]
                }
            },

            save: function (props) {
                const {attributes} = props
                attributes.description = escapeQuotes(attributes.description)
                return null
            },
        }
    ]
})