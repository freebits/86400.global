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
    account_id INTEGER REFERENCES account(id),
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS subscription (
    id SERIAL PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    price_cents INTEGER NOT NULL CHECK (price_cents > 0),
    billing_period_days INTEGER NOT NULL CHECK (billing_period_days > 0),
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS account_subscription (
    id SERIAL PRIMARY KEY,
    account_id INTEGER NOT NULL REFERENCES account(id),
    subscription_id INTEGER NOT NULL REFERENCES subscription(id),
    credit_card_id INTEGER NOT NULL REFERENCES credit_card(id),
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS charge (
    id SERIAL PRIMARY KEY,
    account_subscription_id INTEGER NOT NULL REFERENCES account_subscription(id),
    created TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
);

