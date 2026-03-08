# WildRose Realty 2026 - Premium Real Estate WordPress Theme

A sophisticated, modern WordPress theme designed for luxury real estate agencies, property brokers, and investment firms. Inspired by high-end real estate websites like Livewater Properties, this theme combines elegant design with powerful functionality for showcasing premium properties.

## Features

### Design & Layout
- **Responsive Design**: Fully mobile-optimized for all devices
- **Modern Aesthetics**: Clean, professional luxury brand styling
- **Custom Color Scheme**: Earthy tones (browns, tans) with sophisticated accents
- **Professional Typography**: Merriweather display font with Open Sans body text
- **Smooth Animations**: CSS-based animations and transitions

### Property Management
- **Custom Property Post Type**: Dedicated post type for property listings
- **Property Taxonomies**: 
  - Locations (hierarchical)
  - Property Types/Lifestyles (hierarchical)
- **Custom Fields Support**: Price, bedrooms, bathrooms, square footage, status
- **Featured Properties**: Mark properties to showcase on homepage
- **Property Gallery**: Multiple images per property
- **Property Cards**: Beautiful grid layout with hover effects

### Additional Features
- **Custom Agents Post Type**: Showcase your team members
- **Homepage Template**: Hero section, featured properties, about section, stats, newsletter
- **Search Functionality**: Built-in property search with filters
- **Newsletter Integration**: Subscription form on homepage
- **Responsive Navigation**: Mobile-friendly menu with dropdowns
- **Widget Areas**: Multiple footer widget areas
- **Custom Widgets**: Ready for popular property listing plugins
- **Blog Support**: Full blogging capabilities with related posts
- **Comments**: User comments with customized styling
- **Customizer Options**: Phone, email, about text, social links

## Installation

1. **Download the Theme**
   - Download the `WildRoseRealty-2026` folder
   
2. **Upload to WordPress**
   - Via FTP: Upload to `/wp-content/themes/`
   - Via WordPress Admin: Go to Appearance → Themes → Add New → Upload Theme
   
3. **Activate the Theme**
   - Go to WordPress Admin Dashboard
   - Navigate to Appearance → Themes
   - Click "Activate" on WildRose Realty 2026

4. **Customize**
   - Go to Appearance → Customize
   - Update theme options (phone, email, social links, etc.)

## Creating Content

### Creating Properties

1. Go to Dashboard → Properties
2. Click "Add New"
3. Fill in the following:
   - **Title**: Property name/address
   - **Description**: Full property details
   - **Featured Image**: Main property photo
   - **Location**: Select from property locations
   - **Type**: Select property type (e.g., Ranch, Hunting, Fly Fishing)
   - **Custom Fields** (if using ACF or similar):
     - Price
     - Bedrooms
     - Bathrooms
     - Square Footage
     - Property Status (New, Price Reduced, Sold, etc.)

4. To mark as featured:
   - Check "Featured Property" in the featured properties meta box

### Creating Agents

1. Go to Dashboard → Agents
2. Click "Add New"
3. Fill in agent information
4. Upload agent photo as featured image

## Theme Customization

### Colors
Edit the CSS variables in `style.css`:
```css
:root {
  --color-primary: #8B6F47;           /* Brown/tan */
  --color-accent: #2C4A3E;            /* Dark green */
  /* ...more colors... */
}
```

### Fonts
Google Fonts are loaded in `functions.php`:
- **Display**: Merriweather (serif)
- **Body**: Open Sans (sans-serif)

Change fonts by updating the Google Fonts URL or using local fonts.

### Homepage Text
Go to **Appearance → Customize** to update:
- Business phone number
- About section text and image
- Social media links

## File Structure

```
WildRoseRealty-2026/
├── style.css                    # Main stylesheet
├── functions.php                # Theme functions
├── header.php                   # Header template
├── footer.php                   # Footer template
├── index.php                    # Main archive template
├── single.php                   # Single post template
├── front-page.php               # Homepage template
├── 404.php                      # 404 page
├── comments.php                 # Comments template
├── searchform.php               # Search form
├── assets/
│   ├── css/
│   │   ├── theme.css           # Theme styles
│   │   ├── header.css          # Header styles
│   │   └── properties.css      # Property-specific styles
│   ├── js/
│   │   ├── main.js             # Main JavaScript
│   │   └── navigation.js       # Navigation JavaScript
│   ├── images/                 # Theme images
│   └── fonts/                  # Custom fonts
└── template-parts/
    ├── property-card.php       # Property card component
    ├── content.php             # Post content template
    ├── content-none.php        # No posts template
    └── content-related.php     # Related posts template
```

## Recommended Plugins

- **ACF Pro**: For advanced custom fields on properties
- **Elementor**: For page building
- **Contact Form 7**: For contact forms
- **Yoast SEO**: For search engine optimization
- **WP Rocket**: For caching and performance
- **Gravity Forms**: For advanced property search forms

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

The theme is optimized for speed:
- Minified CSS and JavaScript
- Lazy loading support for images
- Mobile-first responsive design
- Efficient database queries

## Security

This theme follows WordPress security best practices:
- Proper escaping of user input
- NONCE verification for forms
- Sanitization of data
- Regular security updates recommended

## Support & Updates

For updates and support:
- Check for updates in WordPress Dashboard
- Follow best practices for child theme customization
- Backup before major updates

## Changelog

### Version 1.0.0
- Initial release
- Property post type and taxonomies
- Featured properties showcase
- Responsive design
- Mobile navigation
- Newsletter signup
- Custom color scheme

## License

This theme is licensed under the GNU General Public License v2.0 or later.

## Credits

Theme inspired by:
- Livewater Properties website design
- Modern luxury real estate branding
- WordPress best practices
- Responsive web design standards

## Developer Notes

### Custom Post Types
- `property`: Properties with custom metadata
- `agent`: Team members

### Custom Taxonomies
- `property-location`: Geographic locations
- `property-type`: Property types/lifestyles

### Action Hooks
- `after_setup_theme`: Theme setup
- `wp_enqueue_scripts`: Script and style registration
- `widgets_init`: Widget area registration

### Filter Hooks
- `body_class`: Add custom body classes
- `excerpt_length`: Custom excerpt length
- `excerpt_more`: Custom excerpt more text

### Template Tags
- `wildrose_get_property_image()`: Get property featured image
- `wildrose_format_price()`: Format price with K/M notation

## Getting Started Guide

1. **Create your main content areas**
   - Create About, Contact, Properties pages (use front-page.php as template)

2. **Set up navigation**
   - Go to Appearance → Menus
   - Create Primary Menu with main navigation items
   - Set as Primary Menu location

3. **Add properties**
   - Create property locations and types in taxonomy pages
   - Start adding your featured properties

4. **Customize appearance**
   - Upload logo (Appearance → Customize → Logo)
   - Set phone number and email
   - Update social media links
   - Customize about section text and image

5. **Configure home page**
   - Go to Settings → Reading
   - Set Front Page to "A static page"
   - Select front-page.php as Home

## FAQ

**Q: How do I add properties?**
A: Go to Dashboard → Properties → Add New, fill in details, and publish.

**Q: Can I change the colors?**
A: Yes, edit the CSS variables in style.css or use a child theme.

**Q: Does it support property images?**
A: Yes, upload featured images and use the gallery feature.

**Q: Is it mobile responsive?**
A: Yes, fully responsive mobile-first design.

**Q: Can I add custom fields?**
A: Yes, this theme supports ACF and custom fields via post meta.

---

**Theme Version:** 1.0.0  
**Requires WordPress:** 5.9+  
**Requires PHP:** 7.4+  
**License:** GPL v2 or later  

Enjoy your new luxury real estate WordPress theme!
