CREATE TABLE IF NOT EXISTS contact (
    id SERIAL PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    phone VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    message VARCHAR(512) NOT NULL,
    ip_address INET NOT NULL,
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS account (
    id SERIAL PRIMARY KEY,
    username VARCHAR(128) NOT NULL,
    password_hash VARCHAR(32) NOT NULL,
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS credit_card (
    id SERIAL PRIMARY KEY,
    card_reference VARCHAR(128) NOT NULL,
    account_id INTEGER REFERENCES account(id)
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS subscription (
    id SERIAL PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    price_cents INTEGER NOT NULL CHECK (price > 0),
    billing_period_days INTEGER NOT NULL CHECK (billing_period > 0)
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS account_subscription (
    account_id INTEGER NOT NOT NULL,
    subscription_id INTEGER NOT NULL,
    credit_card_id INTEGER NOT NULL REFERENCES credit_card(id),
    PRIMARY KEY (account_id, subscription_id)
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE IF NOT EXISTS charge (
    id SERIAL PRIMARY KEY,
    amount INTEGER NOT NULL CHECK (amount >= 0),
    account_id INTEGER NOT NULL,
    subscription_id INTEGER NOT NULL,
    FOREIGN KEY (account_id, subscription_id) REFERENCES account_subscription (account_id, subscription_id),
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

