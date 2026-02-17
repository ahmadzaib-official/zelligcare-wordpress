# Fix Missing Specialty Content

If your specialty pages are showing empty, here are the steps to fix it:

## Option 1: Import from HTML Files (Recommended)

1. Go to **WordPress Admin → Tools → Import HTML Content**
2. Check the "File Check Status" table to verify HTML files are found
3. Click **"Import All Content from HTML Files"**
4. Check the results - it should show how many pages were updated

## Option 2: Manually Add Content

If the import doesn't work, you can manually add content:

### For Each Specialty Page:

1. Go to **Pages → All Pages** in WordPress admin
2. Find the specialty page (e.g., "Anxiety", "ADHD", etc.)
3. Click **Edit**
4. Scroll down to the **"Page Content Sections"** meta box
5. Click **"+ Add Section"** for each content block
6. For each section, add:
   - **Section Title** (e.g., "Understanding Anxiety")
   - **Section Content** (the text content - supports HTML)
   - **Section Image** (optional - upload or paste image URL)

### Example Structure for Anxiety Page:

**Section 1:**
- Title: "Understanding Anxiety"
- Content: "Anxiety is more than occasional worry. When it becomes constant, overwhelming, or disruptive..."
- Image: [Upload anxiety image]

**Section 2:**
- Title: "Why Treatment Matters"
- Content: "Unchecked anxiety can affect your health, your relationships..."
- Image: [Upload anxiety image]

**Section 3:**
- Title: "What to Expect at Zellig"
- Content: "1. Comprehensive evaluation..."
- Image: [Upload anxiety image]

## Option 3: Check HTML File Location

The import looks for HTML files in these locations:
- `wp-content/themes/your-theme/../zelligcare.com/anxiety.html`
- `wp-content/themes/your-theme/../../zelligcare.com/anxiety.html`
- `wp-content/../zelligcare.com/anxiety.html`

Make sure your HTML files are in one of these locations.

## Troubleshooting

### Import Shows 0 Pages Updated
- Check that HTML files exist and are readable
- Verify file paths in the "File Check Status" table
- Try the "Test Extraction" button to see what's being extracted

### Content Still Not Showing
- Clear any caching plugins
- Check that pages exist in WordPress (they should be auto-created)
- Verify the page template is set correctly
- Check browser console for JavaScript errors

### Need Help?
- Check the import page for error messages
- Review the HTML-CONTENT-IMPORT-GUIDE.md for detailed instructions
- Ensure HTML files match the expected structure
