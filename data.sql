-- Table: ai_providers
CREATE TABLE ai_providers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    api_key VARCHAR(255) NOT NULL,
    active BOOLEAN DEFAULT FALSE,
    settings JSON NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Table: rewrites
CREATE TABLE rewrites (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    draft_id BIGINT UNSIGNED NOT NULL,
    original_content LONGTEXT NOT NULL,
    rewritten_content LONGTEXT NULL,
    provider VARCHAR(255) NOT NULL,
    mode VARCHAR(255) NULL,
    originality FLOAT NULL,
    clarity FLOAT NULL,
    status VARCHAR(255) DEFAULT 'pending',
    history JSON NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Table: rewrite_logs
CREATE TABLE rewrite_logs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rewrite_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED NULL,
    action VARCHAR(255) NULL,
    provider VARCHAR(255) NOT NULL,
    mode VARCHAR(255) NULL,
    duration FLOAT NULL,
    originality FLOAT NULL,
    clarity FLOAT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
