<?php

namespace App\Services;

use GuzzleHttp\Client;
use MailerLite\MailerLite;
use Exception;

class MailerLiteService
{
    protected $client;
    protected $apiKey;

    /**
     * Initialize the service with a MailerLite API key.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        // Initialize the SDK client for endpoints it supports
        $this->client = new MailerLite(['api_key' => $apiKey]);
    }

    /*
    |--------------------------------------------------------------------------
    | Subscribers API Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get a list of subscribers.
     *
     * @return array
     * @throws Exception
     */
    public function getSubscribers()
    {
        try {
            return $this->client->subscribers->get();
        } catch (Exception $e) {
            throw new Exception('Error fetching subscribers: ' . $e->getMessage());
        }
    }

    /**
     * Find a subscriber by ID.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function findSubscriber($id)
    {
        try {
            return $this->client->subscribers->find($id);
        } catch (Exception $e) {
            throw new Exception('Error finding subscriber: ' . $e->getMessage());
        }
    }

    /**
     * Create a new subscriber.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createSubscriber(array $data)
    {
        try {
            return $this->client->subscribers->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating subscriber: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing subscriber.
     *
     * @param int|string $id
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function updateSubscriber($id, array $data)
    {
        try {
            return $this->client->subscribers->update($id, $data);
        } catch (Exception $e) {
            throw new Exception('Error updating subscriber: ' . $e->getMessage());
        }
    }

    /**
     * Delete a subscriber.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function deleteSubscriber($id)
    {
        try {
            return $this->client->subscribers->delete($id);
        } catch (Exception $e) {
            throw new Exception('Error deleting subscriber: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Campaigns API Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get a list of campaigns.
     *
     * @return array
     * @throws Exception
     */
    public function getCampaigns(array $params = [])
    {
        try {
            return $this->client->campaigns->get($params);
        } catch (Exception $e) {
            throw new Exception('Error fetching campaigns: ' . $e->getMessage());
        }
    }

    /**
     * Find a campaign by ID.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function findCampaign($id)
    {
        try {
            return $this->client->campaigns->find($id);
        } catch (Exception $e) {
            throw new Exception('Error finding campaign: ' . $e->getMessage());
        }
    }

    /**
     * Create a new campaign.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createCampaign(array $data)
    {
        try {
            return $this->client->campaigns->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating campaign: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing campaign.
     *
     * @param int|string $id
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function updateCampaign($id, array $data)
    {
        try {
            return $this->client->campaigns->update($id, $data);
        } catch (Exception $e) {
            throw new Exception('Error updating campaign: ' . $e->getMessage());
        }
    }

    /**
     * Delete a campaign.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function deleteCampaign($id)
    {
        try {
            return $this->client->campaigns->delete($id);
        } catch (Exception $e) {
            throw new Exception('Error deleting campaign: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Groups API Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get a list of groups.
     *
     * @return array
     * @throws Exception
     */
    public function getGroups()
    {
        try {
            return $this->client->groups->get();
        } catch (Exception $e) {
            throw new Exception('Error fetching groups: ' . $e->getMessage());
        }
    }

    /**
     * Find a group by ID.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function findGroup($id)
    {
        try {
            return $this->client->groups->find($id);
        } catch (Exception $e) {
            throw new Exception('Error finding group: ' . $e->getMessage());
        }
    }

    /**
     * Create a new group.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createGroup(array $data)
    {
        try {
            return $this->client->groups->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating group: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing group.
     *
     * @param int|string $id
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function updateGroup($id, array $data)
    {
        try {
            return $this->client->groups->update($id, $data);
        } catch (Exception $e) {
            throw new Exception('Error updating group: ' . $e->getMessage());
        }
    }

    /**
     * Delete a group.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function deleteGroup($id)
    {
        try {
            return $this->client->groups->delete($id);
        } catch (Exception $e) {
            throw new Exception('Error deleting group: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Forms API Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get a list of forms.
     *
     * @return array
     * @throws Exception
     */
    public function getForms()
    {
        try {
            return $this->client->forms->get();
        } catch (Exception $e) {
            throw new Exception('Error fetching forms: ' . $e->getMessage());
        }
    }

    /**
     * Find a form by ID.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function findForm($id)
    {
        try {
            return $this->client->forms->find($id);
        } catch (Exception $e) {
            throw new Exception('Error finding form: ' . $e->getMessage());
        }
    }

    /**
     * Create a new form.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createForm(array $data)
    {
        try {
            return $this->client->forms->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating form: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing form.
     *
     * @param int|string $id
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function updateForm($id, array $data)
    {
        try {
            return $this->client->forms->update($id, $data);
        } catch (Exception $e) {
            throw new Exception('Error updating form: ' . $e->getMessage());
        }
    }

    /**
     * Delete a form.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function deleteForm($id)
    {
        try {
            return $this->client->forms->delete($id);
        } catch (Exception $e) {
            throw new Exception('Error deleting form: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Automations API Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get a list of automations.
     *
     * @return array
     * @throws Exception
     */
    public function getAutomations(array $params = [])
    {
        try {
            return $this->client->automations->get($params);
        } catch (Exception $e) {
            throw new Exception('Error fetching automations: ' . $e->getMessage());
        }
    }

    /**
     * Find an automation by ID.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function findAutomation($id)
    {
        try {
            return $this->client->automations->find($id);
        } catch (Exception $e) {
            throw new Exception('Error finding automation: ' . $e->getMessage());
        }
    }

    /**
     * Create a new automation.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createAutomation(array $data)
    {
        try {
            return $this->client->automations->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating automation: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing automation.
     *
     * @param int|string $id
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function updateAutomation($id, array $data)
    {
        try {
            return $this->client->automations->update($id, $data);
        } catch (Exception $e) {
            throw new Exception('Error updating automation: ' . $e->getMessage());
        }
    }

    /**
     * Delete an automation.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function deleteAutomation($id)
    {
        try {
            return $this->client->automations->delete($id);
        } catch (Exception $e) {
            throw new Exception('Error deleting automation: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Templates API Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get a list of templates.
     *
     * @return array
     * @throws Exception
     */
    public function getTemplates()
    {
        try {
            return $this->client->templates->get();
        } catch (Exception $e) {
            throw new Exception('Error fetching templates: ' . $e->getMessage());
        }
    }

    /**
     * Find a template by ID.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function findTemplate($id)
    {
        try {
            return $this->client->templates->find($id);
        } catch (Exception $e) {
            throw new Exception('Error finding template: ' . $e->getMessage());
        }
    }

    /**
     * Create a new template.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createTemplate(array $data)
    {
        try {
            return $this->client->templates->create($data);
        } catch (Exception $e) {
            throw new Exception('Error creating template: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing template.
     *
     * @param int|string $id
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function updateTemplate($id, array $data)
    {
        try {
            return $this->client->templates->update($id, $data);
        } catch (Exception $e) {
            throw new Exception('Error updating template: ' . $e->getMessage());
        }
    }

    /**
     * Delete a template.
     *
     * @param int|string $id
     * @return array
     * @throws Exception
     */
    public function deleteTemplate($id)
    {
        try {
            return $this->client->templates->delete($id);
        } catch (Exception $e) {
            throw new Exception('Error deleting template: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | E-commerce API Methods
    |--------------------------------------------------------------------------
    |
    | These methods use a Guzzle client to call endpoints that are not wrapped
    | by the official MailerLite PHP SDK.
    |
    */

    /**
     * Get a Guzzle HTTP client pre-configured for MailerLite API requests.
     *
     * @return Client
     */
    private function getGuzzleClient(): Client
    {
        return new Client([
            'base_uri' => 'https://api.mailerlite.com/api/v2/',
            'headers'  => [
                'Content-Type'      => 'application/json',
                // Using the header required by MailerLite for authentication
                'X-MailerLite-ApiKey' => $this->apiKey,
            ],
        ]);
    }

    /**
     * Get a list of e-commerce shops.
     *
     * @return array
     * @throws Exception
     */
    public function getEcommerceShops(): array
    {
        try {
            $client = $this->getGuzzleClient();
            $response = $client->get('ecommerce/shops');
            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } catch (Exception $e) {
            throw new Exception('Error fetching e-commerce shops: ' . $e->getMessage());
        }
    }

    /**
     * Get details of a specific e-commerce shop.
     *
     * @param string $shopId
     * @return array
     * @throws Exception
     */
    public function getEcommerceShop(string $shopId): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->get("ecommerce/shops/{$shopId}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error fetching e-commerce shop: ' . $e->getMessage());
        }
    }

    /**
     * Update an e-commerce shop.
     *
     * @param string $shopId
     * @param array  $data
     * @return array
     * @throws Exception
     */
    public function updateEcommerceShop(string $shopId, array $data): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->patch("ecommerce/shops/{$shopId}", [
                'json' => $data,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error updating e-commerce shop: ' . $e->getMessage());
        }
    }

    /**
     * Delete an e-commerce shop.
     *
     * @param string $shopId
     * @return array
     * @throws Exception
     */
    public function deleteEcommerceShop(string $shopId): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->delete("ecommerce/shops/{$shopId}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error deleting e-commerce shop: ' . $e->getMessage());
        }
    }

    // --- E-commerce Orders ---

    /**
     * List all e-commerce orders.
     *
     * @return array
     * @throws Exception
     */
    public function getEcommerceOrders(): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->get("ecommerce/orders");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error fetching e-commerce orders: ' . $e->getMessage());
        }
    }

    /**
     * Get details of a specific e-commerce order.
     *
     * @param string $orderId
     * @return array
     * @throws Exception
     */
    public function getEcommerceOrder(string $orderId): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->get("ecommerce/orders/{$orderId}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error fetching e-commerce order: ' . $e->getMessage());
        }
    }

    /**
     * Create a new e-commerce order.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createEcommerceOrder(array $data): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->post("ecommerce/orders", [
                'json' => $data,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error creating e-commerce order: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing e-commerce order.
     *
     * @param string $orderId
     * @param array  $data
     * @return array
     * @throws Exception
     */
    public function updateEcommerceOrder(string $orderId, array $data): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->patch("ecommerce/orders/{$orderId}", [
                'json' => $data,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error updating e-commerce order: ' . $e->getMessage());
        }
    }

    /**
     * Delete an e-commerce order.
     *
     * @param string $orderId
     * @return array
     * @throws Exception
     */
    public function deleteEcommerceOrder(string $orderId): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->delete("ecommerce/orders/{$orderId}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error deleting e-commerce order: ' . $e->getMessage());
        }
    }

    // --- E-commerce Products ---

    /**
     * List all e-commerce products.
     *
     * @return array
     * @throws Exception
     */
    public function getEcommerceProducts(): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->get("ecommerce/products");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error fetching e-commerce products: ' . $e->getMessage());
        }
    }

    /**
     * Get details of a specific e-commerce product.
     *
     * @param string $productId
     * @return array
     * @throws Exception
     */
    public function getEcommerceProduct(string $productId): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->get("ecommerce/products/{$productId}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error fetching e-commerce product: ' . $e->getMessage());
        }
    }

    /**
     * Create a new e-commerce product.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createEcommerceProduct(array $data): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->post("ecommerce/products", [
                'json' => $data,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error creating e-commerce product: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing e-commerce product.
     *
     * @param string $productId
     * @param array  $data
     * @return array
     * @throws Exception
     */
    public function updateEcommerceProduct(string $productId, array $data): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->patch("ecommerce/products/{$productId}", [
                'json' => $data,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error updating e-commerce product: ' . $e->getMessage());
        }
    }

    /**
     * Delete an e-commerce product.
     *
     * @param string $productId
     * @return array
     * @throws Exception
     */
    public function deleteEcommerceProduct(string $productId): array
    {
        try {
            $client   = $this->getGuzzleClient();
            $response = $client->delete("ecommerce/products/{$productId}");
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception('Error deleting e-commerce product: ' . $e->getMessage());
        }
    }
}
