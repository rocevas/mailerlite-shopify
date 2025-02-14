# Mailerlite Shopify App

### How to test
1. Copy the environment file: `cp .env.example .env`
2. Update the .env file by setting the APP_URL to your ngrok link: https://{your-link}.ngrok-free.app
3. Create a Shopify Partner account. https://www.shopify.com/partners
4. Manually create a Shopify App.
5. Add your SHOPIFY_API_KEY and SHOPIFY_API_SECRET to the .env file.
6. Run the setup command: `make setup`
7. Test the app on your Shopify store.
